app.controller('authCtrl', function ($scope, $rootScope, $routeParams, $location, $http, Data) {
    //initially set those objects to null to avoid undefined error
    $scope.obj = {'idisable':false};
    $scope.ced = {'cedula':false}
    $scope.objmat = {'matriculadisable':false}
    $scope.objpago = {'pagodisabled':false}
    $scope.btnName = "Insertar";
    $scope.btnNameDoc = "Insertar";
    $scope.btnNameCur = "Insertar";
    $scope.btnNameDocCur = "Insertar";
    $scope.btnNameStudCur = "Insertar";

    $scope.login = {};
    $scope.signup = {};

    //Login
    $scope.doLogin = function (customer) {
        Data.post('login', {
            customer: customer
        }).then(function (results) {
            Data.toast(results);
            if (results.status == "success") {
                $location.path('dashboard');
            }
        });
    };

    //Metodo Inicial
    $scope.loadDrops = function(){
        $scope.loadDoc();
        $scope.loadCur();
        $scope.loadStud();
    }

    //Carga Docente
    $scope.loadDoc = function(){  
           $http.get("partials/load_docente.php")  
           .success(function(data){  
                $scope.datadoc = data;  
           })  
    }

    //Carga Estudiante
    $scope.loadStud = function(){  
           $http.get("partials/load_student.php")  
           .success(function(data){  
                $scope.datastud = data;  
           })  
    }

    //Carga Curso
    $scope.loadCur = function(){
           $http.get("partials/load_curso.php")  
           .success(function(data){  
                $scope.datacur = data;  
           })  
    }

    //Carga Docente para Curso Estudiante
    $scope.changeDoc = function(){  
           $http.post("partials/getestdoc.php", {'curso_uid':$scope.curso_uid})  
           .success(function(data){  
                $scope.dataget = data;
           })  
    }

    //Metodo Insert Estudiante
    $scope.insertdata = function(){
        $http.post("partials/insert.php", {'id':$scope.id, 'namestudent':$scope.namestudent, 'matriculastudent':$scope.matriculastudent, 'emailstudent':$scope.emailstudent, 'btnName':$scope.btnName})
        .success(function(){
            $scope.msg = "Datos Insertados";
            $scope.displayStud();
        })
    }

    //Metodo Insert Docente
    $scope.insertdatadoc = function(){
        $http.post("partials/insertdoc.php", {'uid':$scope.id, 'nombredocente':$scope.nombredocente, 'cedula':$scope.cedula, 'emaildocente':$scope.emaildocente, 'btnNameDoc':$scope.btnNameDoc})
        .success(function(){
            $scope.msg = "Datos Insertados";
            $scope.displayDoc();
        })
    }

    //Metodo Insert Curso
    $scope.insertdatacur = function(){
        $http.post("partials/insertcur.php", {'uidcurso':$scope.uidcurso, 'nombrecurso':$scope.nombrecurso, 'descripcion':$scope.descripcion, 'rama':$scope.rama, 'btnNameCur':$scope.btnNameCur})
        .success(function(){
            $scope.msg = "Datos Insertados";
            $scope.displayCur();
        })
    }

    //Metodo Insert Docente Cursp
    $scope.insertdatadoccur = function(){
        $http.post("partials/insertdoccur.php", {'uiddocur':$scope.uiddocur, 'docente_uid':$scope.docente_uid, 'curso_uid':$scope.curso_uid,'btnNameDoccur':$scope.btnNameDocCur})
        .success(function(){
            $scope.msg = "Datos Insertados";
            $scope.displayDocCur();
        })
    }

    //Metodo Insert Estudiante Cursp
    $scope.insertdatastudcur = function(){
        $http.post("partials/insertstudcur.php", {'uidstudcur':$scope.uidstudcur, 'student_id':$scope.student_id, 'curso_uid':$scope.curso_uid, 'docente_uid':$scope.docente_uid,'btnNameStudcur':$scope.btnNameStudCur})
        .success(function(){
            $scope.msg = "Datos Insertados";
            $scope.displayStudCur();
        })
    }

    //Metodo Insert Estudiante Pago
    $scope.pagarStud = function(){
        $http.post("partials/insertpago.php", {'estadopago':$scope.estadopago, 'matriculastudent':$scope.matriculastudent})
        .success(function(mess){
            $scope.msg = "Datos Insertados";
        })
    }

    //Metodo Select Estudiante Pago
    $scope.displayStudPago = function(){
        $http.post("partials/selectpago.php", {'matriculastudent':$scope.matriculastudent})
        .success(function(data){
            $scope.data = data
        })
    }

    //Metodo Select Inpagos
    $scope.displayInpagos = function(){
        $http.post("partials/selectinpagos.php")
        .success(function(data){
            $scope.datainpago = data
        })
    }

    //Metodo Select Estudiante
    $scope.displayStud = function(){
        $http.get("partials/select.php")
        .success(function(data){
            $scope.data = data
        })
    }

    //Metodo Select Docente
    $scope.displayDoc = function(){
        $http.get("partials/selectdoc.php")
        .success(function(data){
            $scope.data = data
        })
    }

    //Metodo Select Curso
    $scope.displayCur = function(){
        $http.get("partials/selectcur.php")
        .success(function(data){
            $scope.data = data
        })
    }

    //Metodo Select Docente en Curso
    $scope.displayDocCur = function(){
        $http.get("partials/selectdoccur.php")
        .success(function(data){
            $scope.data = data
        })
    }

    //Metodo Select Estudiante en Curso
    $scope.displayStudCur = function(){
        $http.post("partials/selectstudcur.php", {'matriculastudent':$scope.matriculastudent})
        .success(function(data){
            $scope.data = data
        })
    }

    //Metodo Delete
    $scope.deleteStud = function(id){
        $http.post("partials/delete.php", {'id':id})
        .success(function(){
            $scope.msg = "Registro Borrado con exito!";
            $scope.displayStud();
        })
    }

    //Metodo Delete Curso
    $scope.deleteCur = function(uidcurso){
        $http.post("partials/deletecur.php", {'uidcurso':uidcurso})
        .success(function(){
            $scope.msg = "Registro Borrado con exito!";
            $scope.displayCur();
        })
    }

    //Metodo Delete Docente
    $scope.deleteDoc = function(uid){
        $http.post("partials/deletedoc.php", {'uid':uid})
        .success(function(){
            $scope.msg = "Registro Borrado con exito!";
            $scope.displayDoc();
        })
    }

    //Metodo Delete Docente en Curso
    $scope.deleteDocCur = function(uiddocur){
        $http.post("partials/deletedoccur.php", {'uiddocur':uiddocur})
        .success(function(){
            $scope.msg = "Registro Borrado con exito!";
            $scope.displayDocCur();
        })
    }

    //Metodo Delete Estudiante en Curso
    $scope.deleteStudCur = function(uidstudcur){
        $http.post("partials/deletestudcur.php", {'uidstudcur':uidstudcur})
        .success(function(){
            $scope.msg = "Registro Borrado con exito!";
            $scope.displayStudCur();
        })
    }

    //Metodo Editar
    $scope.editStud = function(id, namestudent, matriculastudent, emailstudent){
        $scope.id = id;
        $scope.namestudent = namestudent;
        $scope.matriculastudent = matriculastudent;
        $scope.emailstudent = emailstudent;
        $scope.btnName = "Actualizar Registro";
        $scope.obj.idisable = true;
        $scope.objmat.matriculadisable = true;
        $scope.displayStud();
    }

    //Metodo Editar Docente
    $scope.editDoc = function(uid, nombredocente, cedula, emaildocente){
        $scope.id = uid;
        $scope.nombredocente = nombredocente;
        $scope.cedula = cedula;
        $scope.emaildocente = emaildocente;
        $scope.btnNameDoc = "Actualizar Registro";
        $scope.ced.cedula = true;
        $scope.displayDoc();
    }

    //Metodo Editar Curso
    $scope.editCur = function(uidcurso, nombrecurso, descripcion, rama){
        $scope.uidcurso = uidcurso;
        $scope.nombrecurso = nombrecurso;
        $scope.descripcion = descripcion;
        $scope.rama = rama;
        $scope.btnNameCur = "Actualizar Registro";
        $scope.displayCur();
    }

    //Metodo Editar Docente en Curso
    $scope.editDocCur = function(uiddocur, docente_uid, curso_uid){
        $scope.uiddocur = uiddocur;
        $scope.docente_uid = docente_uid;
        $scope.curso_uid = curso_uid;
        $scope.btnNameDocCur = "Actualizar Registro";
        $scope.displayDocCur();
    }

    //Metodo Editar Estudiante en Curso
    $scope.editStudCur = function(uidstudcur, student_id, curso_uid){
        $scope.uidstudcur = uidstudcur;
        $scope.student_id = student_id;
        $scope.curso_uid = curso_uid;
        $scope.btnNameStudCur = "Actualizar Registro";
        $scope.displayStudCur();
    }

    $scope.signup = {email:'',password:'',name:'',phone:'',address:''};
    $scope.signUp = function (customer) {
        Data.post('signUp', {
            customer: customer
        }).then(function (results) {
            Data.toast(results);
            if (results.status == "success") {
                $location.path('dashboard');
            }
        });
    };

    $scope.logout = function () {
        Data.get('logout').then(function (results) {
            Data.toast(results);
            $location.path('login');
        });
    }
});