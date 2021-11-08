<?php require_once("../include/sidebar.php")?>
        <main>
            <header>
                <a href="dashboard.html"> <i class="fas fa-home" style="color: #831d1c;"></i> Dashboard</a>
                <a href="../index.html"> <i class="fas fa-sign-out-alt" style="color: #831d1c;"></i> Logout</a>
            </header>
            <div class="main-content">
                <p>PERFIL</p>
             <div class="perfil-parent">
                 <div class="perfil">
                     <div class="perfil-img">
                        <div class="img">
                        </div>
                     </div>
                     <div class="perfil-form">
                        <form>
                            <div class="mb-3">
                              <label for="name" class="form-label">Nome completo</label>
                              <input type="text" class="form-control" id="name" placeholder="Nome" >
                              
                            </div>
                            <div class="mb-3">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" class="form-control" id="email " placeholder="Email">
                            </div>

                            <div class="mb-3">
                                <label for="idade" class="form-label">Idade</label>
                                <input type="text" class="form-control" id="idade " placeholder="Idade">
                              </div>
                              <div class="mb-3">
                                <label for="genero" class="form-label">Gênero</label>
                                <select class="form-control" id="genero">
                                    <option>Masculino</option>
                                    <option>Feminino</option>
                                    <option>Prefiro não dizer</option>
                                </select>
                            </div>
                              <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="password " placeholder="Senha">
                              </div>

                            <button type="submit" class="btn btn-primary">Salvar dados</button>
                          </form>
                     </div>
                 </div>
             </div>
              </div>    
        </main>
    </div>
    <script src="../plugins/bootstrap-5.1.1-dist/bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>
    <script src="../plugins/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/js/all.min.js"></script>
    <script src="../View/js/ajax.js"></script>
</body>

</html>