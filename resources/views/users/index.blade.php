@extends('layouts.template')
@section('content')
<div class="container pt-5">
    <div class="row">
        @include('users.create')
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-center text-uppercase"
                        style="color: #3b3f5c; font-family:'Courier New', Courier, monospace">Lista de usuarios</h6>
                </div>
                <div class="card-body">
                    <table id="myTable" class="display table-responsive">
                        <thead>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            <?php foreach($users as $u): ?>
                            <tr>
                                <td>
                                    <?php echo $u->id; ?>
                                </td>
                                <td>
                                    <?php echo $u->name; ?>
                                </td>
                                <td>
                                    <?php echo $u->email; ?>
                                </td>
                                <td>
                                    <?php echo $u->phone; ?>
                                </td>
                                <td>
                                    <span
                                        class="badge badge-secondary <?php echo $u->status == 'ACTIVE' ? 'bg-success' : 'bg-danger'; ?>">
                                        <?php if ($u->status == 'ACTIVE') { ?>
                                        <i class="fas fa-check-circle"></i>
                                        <?php } else { ?>
                                        <i class="fas fa-lock"></i>
                                        <?php } ?>
                                        <?php echo $u->status; ?>
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('edit', ['id' => $u->id]) }}" method="GET">
                                        @csrf
                                        @method('GET')
                                        <a href="{{ route('edit', ['id' => $u->id]) }}" class="badge badge-success"><i
                                                class="fas fa-edit"></i></a>
                                    </form>
                                    <a href="" class="badge badge-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
            $('#myTable').DataTable();
        });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#edit' function(e) {
            e.preventDefault();
            var userId = $(this).data('userid');
            $.ajax({
                url: "{{ route('edit', ':id') }}".replace(':id', userId),
                type: 'GET',
            });
        });
    });
</script>
@endpush