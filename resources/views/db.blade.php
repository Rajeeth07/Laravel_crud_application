@if (DB::connection()->getDatabaseName())
    Connected to database: {{ DB::connection()->getDatabaseName() }}
@else
    Failed to connect to database
@endif

