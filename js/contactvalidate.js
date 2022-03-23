function validate(){
    if( document.myForm.email.value == "" ) {
        alert( "Please provide your address" );
        document.myForm.email.focus() ;
        return false;
     }
     
     if( document.myForm.message.value == "" ) {
        alert( "Please provide your address" );
        document.myForm.message.focus() ;
        return false;
     }
}