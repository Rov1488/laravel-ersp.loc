<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class OSGOPCalculatorController extends Controller
{

    // Base rates for different vehicle types (from Appendix 5, Section I, Point 1)
    private $baseRates = [
        'car' => 0.2046, // Легковые автомобили
        'minibus' => 0.0606, // Микроавтобусы
        'bus' => 0.0151, // Автобусы
        'trolleybus' => 0.0102, // Троллейбусы
        'tram' => 0.0102, // Трамваи
        'metro' => 0.0018, // Метрополитен
        'railway' => 0.0091, // Железнодорожный транспорт
        'air' => 0.2513, // Воздушный транспорт
        'other' => 0.0909, // Другие транспортные средства
    ];

    // Coefficients based on claims ratio (from Appendix 5, Section I, Point 3)
    private $claimCoefficients = [
        ['max_ratio' => 0, 'coefficient' => 0.95],
        ['max_ratio' => 0.3, 'coefficient' => 1.00],
        ['max_ratio' => 0.5, 'coefficient' => 1.50],
        ['max_ratio' => PHP_INT_MAX, 'coefficient' => 2.00],
    ];

    public function showForm()
    {
        return view('osgop_calculator');
    }

    public function calculate(Request $request)
    {
       // dd($request->all());
        $request->validate([
            'vehicle_type' => 'required|in:car,minibus,bus,trolleybus,tram,metro,railway,air,other',
            'passenger_capacity' => 'required|integer|min:1',
            'insurance_sum' => 'required|numeric|min:0',
            'previous_premium' => 'required|numeric|min:0',
            'previous_claims' => 'required|numeric|min:0',
            'policy_period' => 'required|integer|min:1',
            'remaining_period' => 'nullable|integer|min:0',
            'claim_amount' => 'nullable|numeric|min:0',
        ]);

        $vehicleType = $request->input('vehicle_type');
        $passengerCapacity = $request->input('passenger_capacity');
        $insuranceSum = $request->input('insurance_sum');
        $previousPremium = $request->input('previous_premium');
        $previousClaims = $request->input('previous_claims');
        $policyPeriod = $request->input('policy_period');
        $remainingPeriod = $request->input('remaining_period', 0);
        $claimAmount = $request->input('claim_amount', 0);

        // Calculate base premium (Appendix 5, Section III, Point 5)
        $baseRate = $this->baseRates[$vehicleType];
        $claimsRatio = $previousClaims / ($previousPremium ?: 1); // Avoid division by zero
        $coefficient = $this->getCoefficient($claimsRatio);

        // Adjust base rate based on claims history (Appendix 5, Section I, Point 2)
        $adjustedRate = $baseRate * $coefficient;

        // Apply limits (Appendix 5, Section II, Point 4)
        $minRate = 0.25 * $baseRate;
        $maxRate = 8 * $baseRate;
        $adjustedRate = max($minRate, min($maxRate, $adjustedRate));

        // Calculate base premium
        $basePremium = $insuranceSum * ($adjustedRate / 100) * $passengerCapacity;

        // Calculate additional premium if applicable (Appendix 6)
        $additionalPremium = 0;
        if ($claimAmount > 0 && $remainingPeriod > 0) {
            $additionalPremium = $basePremium * ($claimAmount / $insuranceSum) * ($remainingPeriod / $policyPeriod);
        }

        // Total premium
        $totalPremium = $basePremium + $additionalPremium;

        // Structure of the premium (Appendix 5, Section IV)
        $netPremium = $totalPremium * 0.75; // 75% for insurance payouts
        $expenses = $totalPremium * 0.25; // 25% for operational expenses

        return view('osgop_calculator', [
            'base_premium' => round($basePremium, 2),
            'additional_premium' => round($additionalPremium, 2),
            'total_premium' => round($totalPremium, 2),
            'net_premium' => round($netPremium, 2),
            'expenses' => round($expenses, 2),
            'input' => $request->all(),
        ]);
    }

    private function getCoefficient($claimsRatio)
    {
        foreach ($this->claimCoefficients as $range) {
            if ($claimsRatio <= $range['max_ratio']) {
                return $range['coefficient'];
            }
        }
        return 2.00; // Default to maximum coefficient
    }

}
