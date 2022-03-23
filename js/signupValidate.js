function validate() {
      
    if( document.myForm.fname.value == "" ) {
       alert( "Please provide your name!" );
       document.myForm.fname.focus() ;
       return false;
    }
    if( document.myForm.lname.value == "" ) {
        alert( "Please provide your name!" );
        document.myForm.lname.focus() ;
        return false;
     }
    if( document.myForm.mail.value == "" ) {
       alert( "Please provide your Email!" );
       document.myForm.mail.focus() ;
       return false;
    }
    if( document.myForm.num.value == "" || isNaN( document.myForm.num.value ) ||
       document.myForm.num.value.length != 10 ) {
       
       alert( "Please provide a num " );
       document.myForm.num.focus() ;
       return false;

    }

if( document.myForm.addone.value == "" ) {
   alert( "Please provide your address" );
   document.myForm.addone.focus() ;
   return false;
}

if( document.myForm.addtwo.value == "" ) {
   alert( "Please provide your address" );
   document.myForm.addtwo.focus() ;
   return false;
}

if( document.myForm.user_name.value == "" ) {
   alert( "Please provide your username" );
   document.myForm.user_name.focus() ;
   return false;
}
if( document.myForm.password.value == "" ) {
   alert( "Please provide your password" );
   document.myForm.password.focus() ;
   return false;
}

    if( document.myForm.imag.value == "" ) {
       alert( "Please provide image" );
       return false;
    }
    return( true );
}