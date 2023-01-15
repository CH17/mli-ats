<div class="col-md-4">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Activity Load</h5>
        </div>
        <div class="ibox-content no-padding">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Planning</th>
                        <th scope="col">Analysis</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row"> {{ $loop->index + 1 }}</th>
                            <td>{{ $user->name }} ({{ $user->role() }})</td>
                            <td>{{ $user->planning }}</td>
                            <td>{{ $user->analysis }}</td>
                            <td>{{ $user->project_user_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
