function validate() { 

        if( document.myForm.username.value == "" )
         {
            alert( "Please provide your Username!!" );
            document.myForm.username.focus() ;
            return false;
         }
          if( document.myForm.password.value == "" )
         {
            alert( "Please provide your Password!!" );
            document.myForm.password.focus() ;
            return false;
         }
         if( document.myForm.password.value.length <8 )
         {
            alert( "Atleast 8 characters for Password!!" );
            document.myForm.password.focus() ;
            return false;
         }

         var convert= document.myForm.username.value;
  if(convert=="solomonaleka") {
    alert("Welcome "+convert.toLocaleUpperCase()+". Admin!!");
  } 
  else {
    alert("Welcome "+convert.toLocaleUpperCase()+". Thankyou for visiting our site!!");
  }
}
// End of form validation code...