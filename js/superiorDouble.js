      function validate() { 
          if( document.myForm.firstname.value == "" )
         {
            alert( "Please provide your First Name with letters only!!" );
            document.myForm.firstname.focus() ;
            return false;
         }
          if( document.myForm.secondname.value == "" )
         {
            alert( "Please provide your Second Name with letters only!!" );
            document.myForm.secondname.focus() ;
            return false;
         }
         
         if( document.myForm.hotelname.value == "-select-" )
         {
            alert( "Please provide Hotel Name!!" );
            document.myForm.hotelname.focus() ;
            return false;
         }
         if( document.myForm.amount.value == "-select-" )
         {
            alert( "Please provide Amount Per Room!!" );
            document.myForm.amount.focus() ;
            return false;
         }

         if(document.myForm.hotelname.value=="Avari Hotels") {
          if(document.myForm.amount.value!=1200) {
            alert("The Amount Per Room for Avari Hotels is 1200!!");
            return false;
          }
         }

         if(document.myForm.hotelname.value=="Aloft Hotels") {
          if(document.myForm.amount.value!=1100) {
            alert("The Amount Per Room for Aloft Hotels is 1100!!");
            return false;
          }
         }
         if(document.myForm.hotelname.value=="Choice Hotels") {
          if(document.myForm.amount.value!=1300) {
            alert("The Amount Per Room for Choice Hotels is 1300!!");
            return false;
          }
         }
         if(document.myForm.hotelname.value=="Clarion Hotels") {
          if(document.myForm.amount.value!=1000) {
            alert("The Amount Per Room for Clarion Hotels is 1000!!");
            return false;
          }
         }
         if( document.myForm.roomNumber.value == "" )
         {
            alert( "Please provide Room Number!" );
            document.myForm.roomNumber.focus() ;
            return false;
         }


         // For the Check In Date...
         if( document.myForm.checkInDate.value == "" )
         {
            alert( "Please provide Check In Date!!" );
            document.myForm.checkInDate.focus() ;
            return false;
         }
         // regular expression to match required date format
    re = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
    if(myForm.checkInDate.value != '' && !myForm.checkInDate.value.match(re)) {
      alert("Invalid date format: " + myForm.checkInDate.value);
      document.myForm.checkInDate.focus();
      return false;
    }
    if(myForm.checkInDate.value != '') {
      if(regs = myForm.checkInDate.value.match(re)) {
        // month value between 1 and 12
        if(regs[1] < 1 || regs[1] > 12) {
          alert("Invalid value for month: " + regs[1]);
          document.myForm.checkInDate.focus();
          return false;
        }
        // day value between 1 and 31
        if(regs[2] < 1 || regs[2] > 31) {
          alert("Invalid value for day: " + regs[2]);
          document.myForm.checkInDate.focus();
          return false;
        }
        // year value should be between 2017 and 2018
        if(regs[3] < (new Date()).getFullYear() || regs[3] > 2018) {
          alert("Invalid value for year: " + regs[3] + " - must be between " + (new Date()).getFullYear()+" and 2018");
          document.myForm.checkInDate.focus();
          return false;
        }
      } else {
        alert("Invalid date format: " + myForm.checkInDate.value);
        document.myForm.checkInDate.focus();
        return false;
      }
    }
    var checkIn = document.myForm.checkInDate.value;
   var inDate = new Date(checkIn);
   var now = new Date();
   if (inDate < now) {
    alert("Check In Date cannot be in the past!!");
    document.myForm.checkInDate.focus();
    return false;
   }
   // End of the Check In Date...




   // For the Check Out Date
   if( document.myForm.checkOutDate.value == "" )
         {
            alert( "Please provide Check Out Date!!" );
            document.myForm.checkOutDate.focus() ;
            return false;
         }
         // regular expression to match required date format
    re = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
    if(myForm.checkOutDate.value != '' && !myForm.checkOutDate.value.match(re)) {
      alert("Invalid date format: " + myForm.checkOutDate.value);
      document.myForm.checkOutDate.focus();
      return false;
    }
    if(myForm.checkOutDate.value != '') {
      if(regs = myForm.checkOutDate.value.match(re)) {
        // month value between 1 and 12
        if(regs[1] < 1 || regs[1] > 12) {
          alert("Invalid value for month: " + regs[1]);
          document.myForm.checkOutDate.focus();
          return false;
        }
        // day value between 1 and 31
        if(regs[2] < 1 || regs[2] > 31) {
          alert("Invalid value for day: " + regs[2]);
          document.myForm.checkOutDate.focus();
          return false;
        }
        // year value should be between 2017 and 2018
        if(regs[3] < (new Date()).getFullYear() || regs[3] > 2018) {
          alert("Invalid value for year: " + regs[3] + " - must be between " + (new Date()).getFullYear()+" and 2018");
          document.myForm.checkOutDate.focus();
          return false;
        }
      } else {
        alert("Invalid date format: " + myForm.checkOutDate.value);
        document.myForm.checkOutDate.focus();
        return false;
      }
    }
    var checkOut = document.myForm.checkOutDate.value;
   var outDate = new Date(checkOut);
   var now = new Date();
   if (outDate < inDate) {
    alert("Check Out Date must be greater than or equal to the Check In Date!!");
    document.myForm.checkOutDate.focus();
    return false;
   }
         // End of Check Out Date...
         
         // Declaration of all the necessary variables...
         var unit_charge=document.myForm.amount.value;
         var hotel_type=document.myForm.hotelname.value;
         alert("You are suppossed to pay "+unit_charge+" for a room in "+hotel_type);
      } // Closing the main validating function...