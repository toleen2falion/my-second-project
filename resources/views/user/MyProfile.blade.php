<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Validation</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css'>
  <link rel="stylesheet" href="/MyProfile/style.css">

</head>
<body>



<form action="{{ url('/userRegistered/dashboard/SaveMyProfile') }}" method="get" id="myForm" lang="ar" dir="rtl">
  <h2>المعلومات الشخصية</h2>
  <div class="form-group date">
    <label for="date"> تاريخ الميلاد</label>
    <input type="date" id="date" name="dateOfBirth" placeholder="Select your date" required>
  </div>

  <div class="form-group fullname">
    <label for="fullname"> الوزن </label>
    <input class="form-control p-1 m-0 " name="weight" id=""
        type="number" step=any value="" placeholder="ادخل وزنك بالكيلو جرام." required >
  </div>

  <div class="form-group email">
    <label for="email"> الطول</label>
    <input class="form-control p-1 m-0 " name="height" id=""
        type="number" step=any value="" placeholder="ادخل طولك بال cm." required>
  </div>

  
  <div class="form-group gender">
    <label for="gender">الجنس</label>
    <select id="gender" name="gender">
      <option value=""   selected disabled>الرجاء تحديد الجنس  </option>
      <option value="ذكر">ذكر</option>
      <option value="أنثى">أنثى</option>
     
    </select>
  </div>

  <div class="form-group phone">
    <label for="phone">رقم هاتفك</label>
    <input type="text" name="phone" id="" placeholder="ادخل رقم هاتفك." required>
   
  </div>
  <div class="form-group ">
    <label for="status"> هل تعني من مرض معين أو لا تستطيع تناول بعض الأطعمة؟ </label>
    <select id="" name="status" required>
      <option value="" selected disabled> </option>
      <option value="نعم">نعم</option>
      <option value="لا">لا</option>
     
    </select>
  </div>

  <div class="form-group ">
    <label for="playSport"> هل تمارس الرياضة بشكل يومي؟ </label>
    <select id="" name="playSport" required>
      <option value="" selected disabled> </option>
      <option value="نعم">نعم</option>
      <option value="لا">لا</option>
     
    </select>
  </div>

  <div class="form-group ">
    <label for="weight_plan_type"> ما هي خطة الوزن التي تريد اتباعها؟ </label>
    <select id="" name="wieghtPlanType" required>
      <option value="" selected disabled> </option>
      <option value="الحفاظ على الوزن">الحفاظ على الوزن</option>
      <option value="فقدان وزن خفيف">فقدان وزن خفيف</option>
      <option value="فقدان وزن">فقدان وزن</option>
      <option value="فقدان وزن شديد"> فقدان وزن شديد</option>
     
    </select>
  </div>
  
  <div class="form-group submit-btn">
  <button type="submit" class="btn btn-primary">حفظ</button>
</div>
</form>

<div id="thank-you-content" style="display: none; color: #ffffff";>
  <h1>شكرأ على تأكيد معلوماتك</h1>
</div>


<script  src="/MyProfile/script.js"></script>
</body>
</html>
