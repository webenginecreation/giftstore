$(document).ready(function(){

	//Banner Validation
	 $("#adminBannerValidation").validate({
        rules: {
            slider_image: {
                   
                   required: true,
                   accept: "jpg|jpeg|png|gif"
                
            },
            title_1: {
               
               maxlength: 25,

            },
            title_2: {
               
               maxlength: 25,
            },
            banner_link: {
               url: true
            },
             position: {
             	required: true,
                digits: true
            },
        },
        messages: {
            slider_image: {
                required: "Please Enter Banner Image",
                accept:"Only jpg, jpeg, png, gif Accepted"
            },
            title_1: {
                maxlength: "Content Only 25 Characters Accepted",
            },
            title_2: {

                maxlength: "Content Only 25 Characters Accepted",
            },
            banner_link: {
                url: "Banner Need Proper URL",
            },
            position: {
                required: "Please Provide Banner Position",
                digits:"Only Digits Accepted"
            },
        }
    });
	//End Banner Validation
	//Category Form Validation
	 $("#adminCategory").validate({
        rules: {
            category_name: {
                   required: true,
               },
               
        },
        messages: {
            category_name: {
                required: "Please Enter Category Name",
            },
        }
    });

	//End

	//Add Product Validation Biztria 1.0.0 Initial
	$("#adminAddProductValidation").validate({
        rules: {
            name: {
                   minlength: 3,
                   required: true,
               },
               meta_title: {
                   minlength: 3,
                   required: true,
               },
               images: {
                    required:true,
                   accept: "jpg|jpeg|png",
                },
                images1: {
                   
                   accept: "jpg|jpeg|png",
                },
                images2: {
                   
                   accept: "jpg|jpeg|png",
                },
                images3: {
                   
                   accept: "jpg|jpeg|png",
                },
                images4: {
                   
                   accept: "jpg|jpeg|png",
                },

                Short_details: {
                   required: true,
                   minlength: 10,
                   maxlength: 255,
               },

                base_price: {
                   required: true,
                   digits: true,
                },
                  wholeseller_price: {
                      required: true,
                   digits: true,
                },
                  reseller_price: {
                      required: true,
                   digits: true,
                },

                discount_price: {
                   required: true,
                   digits: true,
                },
                
                 shipping_charges: {
                   required: true,
                   digits: true,
                },

                category_id: {
                   required: true,
               },
               summernote: {
                   required: true,
               },
               details:{
                   required: true,
               },
               product_link: {
                   url: true,
               },
                meta_title: {
                   required: true,
                   minlength: 2,
               }
              
        },
        messages: {
            name: {
                required: "Please Enter Product Name",
            },
             details: {
                required: "Please Enter Long Description",
            },
            images: {
                required: "Please Choose Product Display Image",
                accept:"Only jpg, jpeg, png Accepted"
            },
            images1: {
                
                accept:"Only jpg, jpeg, png Accepted"
            },
            images2: {
                
                accept:"Only jpg, jpeg, png Accepted"
            },
            images3: {
                
                accept:"Only jpg, jpeg, png Accepted"
            },
            images4: {
                
                accept:"Only jpg, jpeg, png Accepted"
            },
            Short_details: {
                
                minlength: "Content Need Minimum 10 Length",
                maxlength: "Content Need Maximum 255 Length",
                
            },
             base_price: {
                required: "Please Enter Market Price",
                digits: "Only Numeric value Accepted",
            },
            discount_price: {
                required: "Please Enter Sell Price",
                digits: "Only Numeric value Accepted",
            },
             wholeseller_price: {
                required: "Please Enter Price",
                digits: "Only Numeric value Accepted",
            },
             reseller_price: {
               required: "Please Enter Price",
                digits: "Only Numeric value Accepted",
            },
              shipping_charges: {
               required: "Please Enter Shipping Charges",
                digits: "Only Digits Acceptable",
            },
            category_id: {
                required: "Please Select Main Category",
            },
            summernote: {
                required: "Please Fill Details For Product",
            },
            product_link: {
                url: "Please Provide URL Only",
            },
            meta_title: {
                required: "Please Fill Data here",
                minlength: "Content Need Minimum 3 Length",
            }
        },onfocusout: function(element) {
            this.element(element);
        }
    });

     $("#adminEditProductValidation").validate({
            
        rules: {
            name: {
               minlength: 3,
                   required: true,
               },
               details:{
                   required: true,
               },
               images: {
                   accept: "jpg|jpeg|png"
                },
                images1: {
                   
                   accept: "jpg|jpeg|png"
                },
                images2: {
                   
                   accept: "jpg|jpeg|png"
                },
                images3: {
                   
                   accept: "jpg|jpeg|png"
                },
                images4: {
                   
                   accept: "jpg|jpeg|png"
                },

                Short_details: {
                   required: true,
                   minlength: 10,
                   maxlength: 255,
               },

                base_price: {
                   required: true,
                   digits: true,
                },

                discount_price: {
                   required: true,
                   digits: true,
                },
                 wholeseller_price: {
                     required: true,
                   digits: true,
                },
                  reseller_price: {
                      required: true,
                   digits: true,
                },
                shipping_charges: {
                   required: true,
                   digits: true,
                },
                category_id: {
                   required: true,
               },
               summernote: {
                   required: true,
               },
               product_link: {
                   url: true,
               },
                meta_title: {

                   minlength: 2,
               },
               meta_description: {
                   minlength: 10,
               },
               meta_keyword: {
                   minlength: 2,
               },
              
        },
        messages: {
            name: {
                required: "Please Enter Product Name",
            },
             details: {
                required: "Please Enter Long Description",
            },
            images: {
                accept:"Only jpg, jpeg, png Accepted"
            },
            images1: {
                
                accept:"Only jpg, jpeg, png Accepted"
            },
            images2: {
                
                accept:"Only jpg, jpeg, png Accepted"
            },
            images3: {
                
                accept:"Only jpg, jpeg, png Accepted"
            },
            images4: {
                
                accept:"Only jpg, jpeg, png Accepted"
            },
            Short_details: {
                
                minlength: "Content Need Minimum 10 Length",
                maxlength: "Content Need Maximum 255 Length",
                
            },
             base_price: {
                required: "Please Enter Market Price",
                digits: "Only Numeric value Accepted",
            },
             wholeseller_price: {
                required: "Please Enter Price",
                digits: "Only Numeric value Accepted",
            },
             reseller_price: {
               required: "Please Enter Price",
                digits: "Only Numeric value Accepted",
            },
             shipping_charges: {
               required: "Please Enter Shipping Charges",
                digits: "Only Digits Acceptable",
            },
            discount_price: {
                required: "Please Enter Sell Price",
                digits: "Only Numeric value Accepted",
            },
            category_id: {
                required: "Please Select Main Category",
            },
            summernote: {
                required: "Please Fill Details For Product",
            },
            product_link: {
                url: "Please Provide URL Only",
            },

            meta_title: {
                minlength: "Content Need Minimum 3 Length",
            },
            meta_description: {
                minlength: "Content Need Minimum 10 Length",
            },
            meta_keyword: {
                minlength: "Content Need Minimum 3 Length",
            },
             

        },onfocusout: function(element) {
            this.element(element);
        }
    });
   //End
   //Offer Form Validation
     $("#adminOfferValidation").validate({
        rules: {
            offers_name: {
                   required: true,
               },
                start_date: {
                   required: true,
               },
                end_date: {
                   required: true,
               },
        },
        messages: {
            offers_name: {
                required: "Please Enter Offer Name",
            },
            start_date: {
                required: "Please Select Start Date",
            },
            end_date: {
                required: "Please Select End Date",
            },
        }
    });

    //End

    //Site Config Form Validation
     $("#adminSiteConfigValidation").validate({
        rules: {
            store_name: {
                   required: true,
               },
                location: {
                   required: true,
               },
                currency: {
                   required: true,
               },
               mobile: {
                   required: true,
                   digits:true,
                   minlength:10,
                   maxlength:10,
               },
               email: {
                   required: true,
                   email: true
               },
                footer_text: {
                   required: true,
                   
               },
               address: {
                  
                   maxlength:255
                   
               },
               footer_text: {
                   required: true,
                   
               },
               facebook: {
                   url: true,
                   
               },
               twitter: {
                   url: true,
                   
               },
               pinterest: {
                   url: true,
                   
               },
                skype: {
                   url: true,
                   
               },
               
        },
        messages: {
            store_name: {
                required: "Hello! What Is Your Store Name ?",
            },
            location: {
                required: "Where's Your Store Actually Located ?",
            },
            currency: {
                required: "Which Currency You Want To Serve?",
            },
            mobile: {
                required: "Hey Please Tell Us Your Phone Number",
                digits: "Only Numbers Please.",
                minlength: "We Think you Miss Some Digit to Add, Minimun 10 Needed",
                maxlength: "Ohh! Do Not Hurry!! Only Need 10 Numbers",
            },
            email: {
                required: "May i Have your Email Address ?",
                email: "Here Only wants Email, Format Wrong!",
            },
             footer_text: {
                required: "It's Important, Who have Copyrights ?",
                
            },
            address: {
                maxlength: "Address length 255 Only",
            },
            facebook: {
                url: "Please Enter Valid URL.",
            },
            twitter: {
                url: "Please Enter Valid URL.",
            },
            pinterest: {
                url: "Please Enter Valid URL.",
            },
            skype: {
                url: "Please Enter Valid URL.",
            },
           
        }
    });

    //End

    //Admin Profile Form Validation
     var value = $("#password").val();
    $.validator.addMethod("checklower", function(value) {
        return /[a-z]/.test(value);
    });
    $.validator.addMethod("checkupper", function(value) {
        return /[A-Z]/.test(value);
    });
    $.validator.addMethod("checkdigit", function(value) {
        return /[0-9]/.test(value);
    });
    $.validator.addMethod("pwcheck", function(value) {
        return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) && /[a-z]/.test(value) && /\d/.test(value) && /[A-Z]/.test(value);
    });

     $("#adminProfileValidation").validate({
        rules: {
            old_password: {
                required: true,
            },
            password: {
                minlength: 7,
                maxlength: 30,
                required: true,
                pwcheck: true,
                checklower: true,
                checkupper: true,
                checkdigit: true
            },
            confirm_password: {
                equalTo: "#password",
            },
               
        },
        messages: {
             old_password: {
                required: "Please Enter Your Old Password",
            },

            password: {
                pwcheck: "Password is not strong enough",
                required: "Please Enter Password",
                minlength: "Please Minimum 7 length",
                maxlength: "Please Maximum 30 length",
                checklower: "Please Enter At least 1 lower Case",
                checkupper: "Please Enter At least 1 Upper Case",
                checkdigit: "Please Enter At least 1 Digit",
            },
           
        }
    });

    //End


      //Category Form Validation
   $("#adminBrandValidation").validate({
        rules: {
            brand_name: {
                   required: true,
               },
               about_brand: {
                minlength:5,
                   maxlength:255,
               },
        },
        messages: {
            brand_name: {
                required: "Please Enter Brand Name",
            },
             about_brand: {
                maxlength: "Only 255 character Acceptable",
                 minlength: "Minimum 5 charecters",
            },
        }
    });

  //End
//alert();

  //Excel File Uplaod Form Validation
   $("#AddProductExcelValidation").validate({
    

        rules: {
            file: {
                   required: true,
               },
        },
        messages: {
            file: {
                required: "Please Selelct Xls File",
            },
        }
    });

  //End
//Blogs Form Validation

 $("#AdminAddBlogForm").validate({
    

        rules: {
            blog_title: {
                   required: true,
                   minlength:3,
               },
               blog_category_id: {
                   required: true,
                  
               },
        },
        messages: {
            blog_title: {
                required: "Whats Your Blog Tite ?",
                minlength: "Need Minimum 3 characters..",
            },
            blog_category_id: {
                required: "Select Blog Category",
                
            },
           
        }
    });

//End
});