<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/fonts/themify-icons/themify-icons.css">
</head>
<body>
  <script src="main.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>  
  <div id="main">
    <div id="header">
      <ul id="nav">
          <li><a href="">Home</a></li>
          <li><a href="#content">Giới thiệu</a></li>
          <li>
              <a href="#kh">Khoá học
            <i class="nav-arrow-down ti-angle-down"></i>
              </a>
              <ul class="subnav">
                  <li><a href="#kh">HTML/CSS</a></li>
                  <li><a href="#kh">PHP</a></li>
                  <li><a href="#kh">Javascript</a></li>
                  <li><a href="#kh">Design</a></li>
              </ul>
         </li>
      </ul>
      <div title="Tìm kiếm" class="search-btn">
        <i class="search-icon ti-search"></i>
      </div>
    </div>
        <div id="slider">
          <div class="text-content">
              <div class="text-heading">
                <form method="POST" action="Login.php">
                <h2>Login💡</h2>
                <div class="input-box">
                  <i></i>
                  <input name="account" type="text" placeholder="Nhập username">
                </div>
                  <div class="input-box">
                    <i></i>
                  <input name= "password" type="password" placeholder="Nhập mật khẩu">
                  </div>
                  <div class="g-recaptcha" data-sitekey="6LffFXAcAAAAAJ5rJZyGnrzfK7gBvJSoVy2Jb06Z" style="margin-top: 15px; margin-left: 120px;"></div>
                  <div>
                  <button class="btn-box" name="sign-in">Đăng nhập</button>
                </div>
                </form>
                <form method="POST" action="./controller.php">
                  <button class="btn-box" name="sign-up">Đăng kí</button>   
                </form>     
                <div>
                <h5>Quên mật khẩu</h5>
                </div>
              
              </div>
              <div class="text-description"></div>
          </div>
        </div>
        <div id="content">
          <div class="content-section">
          <h2 class="section-heading">GIỚI THIỆU</h2>
          <p class="section-subheading">Học viện Kỹ thuật Mật Mã</p>
          <p class="content-body">Học viện Kỹ thuật Mật mã, tiền thân là Trường Cán bộ Cơ yếu Trung ương (15-4-1976), Trường Đại học Kỹ thuật Mật mã (05-6-1985) và Viện Nghiên cứu Khoa học Kỹ thuật Mật mã (20-3-1980), được thành lập ngày 17-02-1995 trên cơ sở sáp nhập Trường Đại học Kỹ thuật Mật mã và Viện Nghiên cứu Khoa học Kỹ thuật Mật mã.
          
   
  
          Học viện Kỹ thuật Mật mã là Trung tâm duy nhất của Việt nam có chức năng đào tạo cán bộ có trình độ đại học, sau đại học và nghiên cứu Khoa học Công nghệ Mật mã của ngành Cơ yếu Việt nam. Tham gia xây dựng phương hướng phát triển Khoa học Công nghệ Mật mã phục vụ yêu cầu phát triển Ngành cơ yếu Việt Nam tiến lên chính quy, hiện đại, đáp ứng yêu cầu phục vụ lãnh đạo, chỉ huy của Đảng, Nhà nước và các lực lượng vũ trang được bí mật, an toàn, nhanh chóng và chính xác. Đào tạo Chuyên ngành An toàn Thông tin (Ngành Công nghệ Thông tin) đáp ứng yêu cầu bảo mật thông tin kinh tế xã hội phục vụ cho sự nghiệp công nghiệp hoá và hiện đại hoá đất nước. Học viện Kỹ thuật Mật mã đặt dưới sự lãnh đạo, chỉ đạo trực tiếp của Ban cơ yếu Chính phủ và Bộ Giáo dục và Đào tạo.
  
  
  
          Học viện Kỹ thuật Mật mã đã thực hiện hàng trăm khoá đào tạo và bồi dưỡng (ngắn hạn và dài hạn), cung cấp nhiều cán bộ nhân viên cho Ngành Cơ yếu Việt nam. Từ năm 1980 Học viện Kỹ thuật Mật mã nhận nhiệm vụ đào tạo bồi dưỡng cán bộ, sỹ quan Cơ yếu cho Nhà nước Lào và Căm-Pu-Chia.
  
  
  
          Học viện Kỹ thuật Mật mã có mối quan hệ hợp tác về đào tạo, nghiên cứu khoa học với các Cơ quan nghiên cứu, các Trường Đại học, các Trung tâm Khoa học Công nghệ Quốc gia, Quân sự, các Viện nghiên cứu chuyên ngành ...trong nước và ngoài nước theo Chiến lược hợp tác quốc tế của Ban Cơ yếu Chính phủ đã được Thủ tướng Chính phủ phê duyệt.
  
  
  
          Thực hiện gắn kết chặt chẽ giữa đào tạo, nghiên cứu, Học viện Kỹ thuật Mật mã đảm nhận nhiều đề tài trọng điểm của Ngành Cơ yếu Việt nam và Nhà nước.
        </p> 
          <div class="logo-list">
            <div class="logo-item">
              <img  title="Ban cơ yếu chính phủ" src="./assets/logo/tải xuống.png" alt="Ban cơ yếu" class="logo-img">
            </div>
            <div class="logo-item">
              <img title="Học Viện Kỹ Thuật Mật Mã" src="./assets/logo/tải xuống.jpg" alt="HVKTMM" class="logo-img">
             </div>
             <div class="clear"></div>
          </div>
        </div>
        </div>
          <div id="kh">
            <div class="kh-section">
          <div class="kh-content">
            <h2 class="kh-section-heading">Khoá Học</h2>
            <p class="kh-section-subheading ">Cho những người mới học</p>
            <div class="kh-list">
              <div class="kh-item">
                <img src="./assets/img/img-kh/html-css-course.jpg" alt="HTML/CSS" class="kh-img">
                <div class="kh-body">
                  <h3 class="kh-body-header">HTML/CSS</h3>
                  <p class="kh-body-content">Cùng xây dựng giao diện nào</p>
                  <a href="https://www.w3schools.com/html/default.asp"><button class="kh-body-btn js-sign-in">Học ngay</button></a>
                </div>
              </div>
              <div class="kh-item">
                <img src="./assets/img/img-kh/1200px-PHP-logo.svg.png" alt="HTML/CSS" class="kh-img">
                <div class="kh-body">
                  <h3 class="kh-body-header">PHP</h3>
                  <p class="kh-body-content">Cùng học nào</p>
                  <a href="https://www.w3schools.com/css/default.asp"><button class="kh-body-btn js-sign-in">Học ngay</button></a>
                </div>
              </div>
              <div class="kh-item">
                <img src="./assets/img/img-kh/JavaScript-logo.png" alt="HTML/CSS" class="kh-img">
                <div class="kh-body">
                  <h3 class="kh-body-header">Javascript</h3>
                  <p class="kh-body-content">Cùng xây dựng giao diện nào</p>
                  <a href="https://www.w3schools.com/js/default.asp"><button class="kh-body-btn js-sign-in">Học ngay</button></a>
                </div>
              </div>
              <div class="kh-item">
                <img src="./assets/img/img-kh/unnamed.jpg" alt="HTML/CSS" class="kh-img">
                <div class="kh-body">
                  <h3 class="kh-body-header">Design</h3>
                  <p class="kh-body-content">Hãy thoả sức sáng tạo </p>
                  <a href="https://www.w3schools.com/bootstrap/bootstrap_ver.asp"><button class="kh-body-btn js-sign-in">Học ngay</button></a>
                </div>
              </div>
              <div class="clear"></div>
            </div>
          </div> 
          </div>
      </div>
    </div>
     <!-- <div class="model js-model">
       <div class="model-container">
         <div class="model-close js-model-close">
          <i class="ti-close"></i>
         </div>
         <header class="model-header">
             Hãy đăng nhập
         </header>
         <div class="model-body">
          
           <label for="user" class="model-label">
            <i class="ti-user" style="margin-right: 6px;"></i>
            Account
           </label>
           <input id="user" type="text" class="model-input" placeholder="Nhập username">
           <label for="pass" class="model-label">
            <i class="ti-lock" style="margin-right: 6px;"></i>
            Password
          </label>
          <input id="pass" type="password" class="model-input" placeholder=" Nhập password">
          <button id="Sign-in">
            Học ngay <i class="ti-check"></i>
          </button>
         </div>
         <div class="model-footer">
           <p class="model-help">Need <a href="">help?</a></p>
         </div>
       </div>
     </div>
     <script>
       const signIns = document.querySelectorAll('.js-sign-in') 
       const model = document.querySelector('.js-model')
       const modelClose = document.querySelector('.js-model-close')
       function showLogin(){
            model.classList.add('open')
       }
       function hideLogin(){
         model.classList.remove('open')
       }
       for(const signIn of signIns){
         signIn.addEventListener('click',showLogin)
       }
       modelClose.addEventListener('click',hideLogin)
        
     </script> -->
     
  </body>
  </html>
  
