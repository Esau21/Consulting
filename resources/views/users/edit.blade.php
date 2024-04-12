@extends('layouts.template')
@section('content')
<div class="container pt-5" style="display: flex; justify-content:center; align-items:center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header" style="background: #FFF">
                <h5 style="font-family:'Times New Roman', Times, serif" class="text-center"> <span
                        class="badge badge-success">Editar Usuario:</span>
                    <?php echo $users->id; ?>
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route("update", ['id'=> $users->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nombre:</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Ingresa el nombre del usuario" value="<?php echo $users->name; ?>">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Ingresa el email del usuario" value="<?php echo $users->email; ?>">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Clave:</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Inserta una clave para el usuario"
                                    value="<?php echo $users->password; ?>">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Status:</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="<?php echo $users->status; ?>">
                                        <?php echo $users->status; ?>
                                    </option>
                                    <option value="ACTIVE">ACTIVE</option>
                                    <option value="LOCKED">LOCKED</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Phone:</label>
                                <input type="text" id="phone" name="phone" class="form-control"
                                    placeholder="Ingresa un telefono para el usuario"
                                    value="<?php echo $users->phone; ?>">
                            </div>
                        </div>
                        <button type="submit" id="sendDataEdit" class="btn btn-outline-primary btn-sm">Editar
                            registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(e) {
            $(document).on('click', '#sendDataEdit', function(e) {
                e.preventDefaulf();
                var name = $('#name').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var status = $('#status').val();
                var phone = $('#phone').val();
                var _token = $('input[name="_token"]').val();
                var UserId = $(this).data('usersid');
                $.ajax({
                    type: "put",
                    url: "{{ route('update', ':id') }}".replace(':id', UserId),
                    data: {
                        _token: _token,
                        name: name,
                        email: email,
                        password: password,
                        status: status,
                        phone: phone
                    },
                    success: function(response) {
                        Toastify({
                            text: response.message,
                            duration: 3000
                        }).showToast();
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    },
                    error: function(hxr, status, error){
                        console.log(error);
                    }
                });
            });
        });
</script>
@endpush