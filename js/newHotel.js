     function validate() { 
          if( document.myForm.hotelname.value == "" )
         {
            alert( "Please provide Hotel Name!!" );
            document.myForm.hotelname.focus() ;
            return false;
         }
         if( document.myForm.email.value == "" )
         {
            alert( "Please provide your Email ID!!" );
            document.myForm.email.focus() ;
            return false;
         }
         
         var emailID = document.myForm.email.value;
         atpos = emailID.indexOf("@");
         dotpos = emailID.lastIndexOf(".");
         
         if (atpos < 1 || ( dotpos - atpos < 2 )) 
         {
            alert("Please enter correct Email ID!!")
            document.myForm.email.focus() ;
            return false;
         }
         if( document.myForm.countryid.value == "" )
         {
            alert( "Please provide Country ID !!" );
            document.myForm.countryid.focus() ;
            return false;
         }

         if( document.myForm.countryid.value == "-select-" )
         {
            alert( "Please provide Country ID!!" );
            document.myForm.countryid.focus() ;
            return false;
         }

         if( document.myForm.cityid.value == "" )
         {
            alert( "Please provide City ID!!" );
            document.myForm.cityid.focus() ;
            return false;
         }

         if( document.myForm.cityid.value == "-select-" )
         {
            alert( "Please provide City ID!!" );
            document.myForm.cityid.focus() ;
            return false;
         }

         if(document.myForm.countryid.value==10000) {
          if(document.myForm.cityid.value!=20000) {
            alert("Select 20000 as City ID!!");
            return false;
          }
         }
         if(document.myForm.countryid.value==10001) {
          if(document.myForm.cityid.value!=20001) {
            alert("Select 20001 as City ID!!");
            return false;
          }
         }
         if(document.myForm.countryid.value==10002) {
          if(document.myForm.cityid.value!=20002) {
            alert("Select 20002 as City ID!!");
            return false;
          }
         }
         if(document.myForm.countryid.value==10003) {
          if(document.myForm.cityid.value!=20003) {
            alert("Select 20003 as City ID!!");
            return false;
          }
         }
         if(document.myForm.countryid.value==10004) {
          if(document.myForm.cityid.value!=20004) {
            alert("Select 20004 as City ID!!");
            return false;
          }
         }
         if(document.myForm.countryid.value==10005) {
          if(document.myForm.cityid.value!=20005) {
            alert("Select 20005 as City ID!!");
            return false;
          }
         }
         if(document.myForm.countryid.value==10006) {
          if(document.myForm.cityid.value!=20006) {
            alert("Select 20006 as City ID!!");
            return false;
          }
         }
         if(document.myForm.countryid.value==10007) {
          if(document.myForm.cityid.value!=20007) {
            alert("Select 20007 as City ID!!");
            return false;
          }
         }
         if(document.myForm.countryid.value==10008) {
          if(document.myForm.cityid.value!=20008) {
            alert("Select 20008 as City ID!!");
            return false;
          }
         }
         if(document.myForm.countryid.value==10009) {
          if(document.myForm.cityid.value!=20009) {
            alert("Select 20009 as City ID!!");
            return false;
          }
         }
         if(document.myForm.countryid.value==10010) {
          if(document.myForm.cityid.value!=20010) {
            alert("Select 20010 as City ID!!");
            return false;
          }
         }
         if(document.myForm.countryid.value==10011) {
          if(document.myForm.cityid.value!=20011) {
            alert("Select 20011 as City ID!!");
            return false;
          }
         }
      }
      // End of form validation code...