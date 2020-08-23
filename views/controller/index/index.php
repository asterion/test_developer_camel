<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="text-right mb-3">
                <a href="/logout" class="btn btn-primary">Salir</a>
            </div>
            <div class="card mb-3 p-2">
              <div class="row no-gutters">
                <div class="col-md-3">
                  <img src="/img/avatar.png" class="card-img">
                </div>
                <div class="col-md-9">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $_SESSION['user']['name']; ?></h5>
                    <p class="card-text text-left">
                        <small class="text-muted">
                            Último acceso: <?php echo $_SESSION['user']['last_access']; ?>
                        </small>
                    </p>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <div id="app">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>name</th>
                                <th>email</th>
                                <th>rol</th>
                                <th>last access</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in users">
                                <td>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bicycle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M3 12a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm10-1a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                      <path fill-rule="evenodd" d="M4 4.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1v.5h4.14l.386-1.158A.5.5 0 0 1 11 4h1a.5.5 0 0 1 0 1h-.64l-.311.935 2.375 3.8a.5.5 0 1 1-.848.53L10.5 6.943l-2.076 3.322A.5.5 0 0 1 8 10.5H3a.5.5 0 0 1-.424-.765L5 5.857V5h-.5a.5.5 0 0 1-.5-.5zm1.5 2.443L3.902 9.5h3.196L5.5 6.943zM8 9.057L9.598 6.5H6.402L8 9.057z"/>
                                    </svg>
                                </td>
                                <td>
                                    <input v-model="item.name" />
                                </td>
                                <td>
                                    <input v-model="item.email" />
                                </td>
                                <td>
                                    {{ item.role }}
                                </td>
                                <td>
                                    {{ item.last_access }}
                                </td>
                                <td>
                                    <button type="button" name="button" class="btn btn-success btn-sm" v-on:click="saveUser(item)">
                                        Guardar
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" class="text-right">
                                    <button class="btn btn-success btn-sm" v-on:click="addUser">
                                        Nuevo
                                    </button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
