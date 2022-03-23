function validate(){

if( document.MyForm.user_name.value == "" ) {
    alert( "Please provide your username" );
    document.MyForm.user_name.focus() ;
    return false;
 }
 if( document.MyForm.password.value == "" ) {
    alert( "Please provide your password" );
    document.MyForm.password.focus() ;
    return false;
 }
}