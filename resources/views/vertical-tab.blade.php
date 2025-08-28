<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details View</title>
    <style>
        .container {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
            gap: 20px;
        }

        .tabs {
            width: 200px;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
        }

        .tab {
            padding: 10px;
            margin-bottom: 5px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
            
        }
        .tabs>.tab{
            border-top: 3px solid transparent;
            margin-bottom: -2px;
            margin-right: 5px;
        }

        .tab:hover {
            background: #f0f1f1;         
        }
        .tab.active{            
            background: #f0f1f1;
            /*margin-bottom: -2px;
            margin-right: 5px;*/
            border-left: #D6C980 3px solid; /*D6C980  00345C*/
            transition: background-color 0.2ms, border-left 0.3ms;
            text-decoration-color: black solid 2px !important bold;
        }

        .tab.active>p{            
            font-weight: bold;
            text-transform: uppercase;
            font-size: 1em;
            /*text-decoration: underline;*/
            border-bottom: 3px solid #3a06f7; /* D6C980 */        
            text-decoration-color: black;
            color: #000508; /* Dark blue for active tab */
        }

       
        .tab-content {
            flex: 1;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .tab-pane {
            display: none;
        }

        .tab-pane.active {
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Vertical Tabs -->
        <div class="tabs">
            <div class="tab active" data-tab="details"><p>Details</p></div>
            <div class="tab" data-tab="settings"><p>Settings</p></div>
            <div class="tab" data-tab="history"><p>History</p></div>
        </div>

        <!-- Tab Content -->
        <div class="tab-content">
            <div class="tab-pane active" id="details">
                <h2>Details</h2>
                @if(isset($item))
                    <p><strong>ID:</strong> {{ $item->id }}</p>
                    <p><strong>Name:</strong> {{ $item->name }}</p>
                    <p><strong>Description:</strong> {{ $item->description }}</p>
                @else
                    <p>No details available.</p>
                @endif
            </div>
            <div class="tab-pane" id="settings">
                <h2>Settings</h2>
                @if(isset($item))
                    <p><strong>Status:</strong> {{ $item->status }}</p>
                    <p><strong>Updated At:</strong> {{ $item->updated_at->format('d/m/Y H:i') }}</p>
                @else
                    <p>No settings available.</p>
                @endif
            </div>
            <div class="tab-pane" id="history">
                <h2>History</h2>
                @if(isset($item->history) && $item->history->count() > 0)
                    <ul>
                        @foreach($item->history as $history)
                            <li>{{ $history->event }} - {{ $history->created_at->format('d/m/Y H:i') }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No history available.</p>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs and panes
                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));

                // Add active class to clicked tab and corresponding pane
                tab.classList.add('active');
                document.getElementById(tab.dataset.tab).classList.add('active');
            });
        });
    </script>
</body>
</html>