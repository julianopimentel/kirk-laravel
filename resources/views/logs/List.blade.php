<x-app-layout layout="boxedfancy" :assets="$assets ?? []">
        <div>
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">{{ __('layout.group') }}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                      <th>Activity</th>
                                      <th>Type</th>
                                      <th>User</th>
                                      <th>Created at</th>
                                      <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($logs as $log)
                                    <tr>
                                      <td><strong>{{ $log->status_log->description }}</strong> 
                                      <td>{{ $log->type($log->type) }}</td>
                                      <td>{{ $log->user->email }}</td>
                                      <td>{{ $log->created_at }}</td>
                                      <td width="10%">
                                            <a href="{{ route('logs.show', $log->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                              </svg></a>
                                    </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            {!! $logs->links() !!}
                        </div>
                    </div>
                </div>
                <!-- /.row-->
            </div>
        </div>
    </div>
</div>
<script>
  $("#name").on("input", function(){
    $(this).val($(this).val().toUpperCase());
});
</script>
</x-app-layout>