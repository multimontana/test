<!DOCTYPE html>
<html>
<head>
    <title>Import Export Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Import Export Example
        </div>
        <div class="card-body">
            <div>
                @if($csvFileName)
                    <a href="<?=$csvFileName?>">Export</a>
                @endif
            </div>
        </div>
    </div>
</div>
</body>
</html>
