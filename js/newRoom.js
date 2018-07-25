function validate() { 
         if( document.myForm.hotelname.value == "-select-" )
         {
            alert( "Please provide Hotel Name!!" );
            document.myForm.hotelname.focus() ;
            return false;
         }
         if( document.myForm.roomtype.value == "-select-" )
         {
            alert( "Please provide Room Type!!" );
            document.myForm.roomtype.focus() ;
            return false;
         }
         if( document.myForm.roomnumber.value == "" )
         {
            alert( "Please provide Room Number!!" );
            document.myForm.roomnumber.focus() ;
            return false;
         }
         if( document.myForm.roomnumber.value == 0 )
         {
            alert( "Please provide a non-zero number for Room Number!!" );
            document.myForm.roomnumber.focus() ;
            return false;
         }
      }
      // End of form validation code...