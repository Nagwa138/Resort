var StaticServer =required('static-server');
var server =new StaticServer({
    rootPath:'./dist/',
    port:8000
});
server.start(function(){
    console.log('Server Started At Port',server.port)
});