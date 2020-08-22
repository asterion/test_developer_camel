<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mb-3">
              <div class="row no-gutters">
                <div class="col-md-3">
                  <img src="/img/avatar.png" class="card-img">
                </div>
                <div class="col-md-9">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $_SESSION['user']['email']; ?></h5>
                    <p class="card-text"><small class="text-muted"><?php echo $_SESSION['user']['last_access']; ?></small></p>
                  </div>
                </div>
              </div>
            </div>
            <a href="/logout">Salir</a>
        </div>
    </div>
</div>
