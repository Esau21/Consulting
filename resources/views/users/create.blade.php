<div class="col-lg-4">
    <div class="card mb-4">
        <div class="card-header">
            <h6 class="text-center text-uppercase"
                style="font-family: 'Courier New', Courier, monospace; color:#211951">
                Agregar nuevo
                usuario</h6>
        </div>
        <div class="card-body">
            <form id="createForm" action="{{ route('store') }}" method="post">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Ingresa el nombre del usuario">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Ingresa el email del usuario">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Clave:</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Inserta una clave para el usuario">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Status:</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">SELECCIONA</option>
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="LOCKED">LOCKED</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Phone:</label>
                            <input type="text" id="phone" name="phone" class="form-control"
                                placeholder="Ingresa un telefono para el usuario">
                        </div>
                    </div>
                    <button type="submit" id="sendData" class="btn btn-outline-dark btn-sm">Ingresar datos</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
            $(document).on('click', '#sendData', function(e) {
                e.preventDefault();
                let name = $('#name').val();
                let email = $('#email').val();
                let password = $('#password').val();
                let status = $('#status').val();
                let phone = $('#phone').val();
                let _token = $('input[name="_token"]').val();
                $.ajax({
                    type: "post",
                    url: "{{ route('store') }}",
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
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
</script>
@endpush