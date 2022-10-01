const sendit = () => {

const userid = document.regiform.userid;
const userpw = document.regiform.userpw;
const userpw_ch = document.regiform.userpw_ch;
const username = document.regiform.username;
const userphone = document.regiform.userphone;
const useremail = document.regiform.useremail;
const userhobby = document.regiform.hobby;

// userid값이 비어있으면 실행.
if(userid.value == '') {
  alert('아이디를 입력해주세요.');
  userid.focus();
  return false;
}
// userid값이 4자 이상 12자 이하를 벗어나면 실행.
if(userid.value.length < 4 || userid.value.length > 12){
  alert("아이디는 4자 이상 12자 이하로 입력해주세요.");
  userid.focus();
  return false;
}
// userpw값이 비어있으면 실행.
if(userpw.value == '') {
  alert('비밀번호를 입력해주세요.');
  userpw.focus();
  return false;
}
// userpw_ch값이 비어있으면 실행.
if(userpw_ch.value == '') {
  alert('비밀번호 확인을 입력해주세요.');
  userpw_ch.focus();
  return false;
}
// userpw값이 6자 이상 20자 이하를 벗어나면 실행.
if(userpw.value.length < 6 || userpw.value.length > 20){
  alert("비밀번호는 6자 이상 20자 이하로 입력해주세요.");
  userpw.focus();
  return false;
}
// userpw값과 userpw_ch값이 다르면 실행.
if(userpw.value != userpw_ch.value) {
  alert('비밀번호가 다릅니다. 다시 입력해주세요.');
  userpw_ch.focus();
  return false;
}
// username값이 비어있으면 실행.
if(username.value == '') {
  alert('Username을 입력해주세요.');
  username.focus();
  return false;
}

// useremail값이 비어있으면 알림창을 띄우고 input에 포커스를 맞춘 뒤 False를 리턴한다.
if(useremail.value == '') {
  alert('이메일을 입력해주세요.');
  useremail.focus();
  return false;
}
// 이메일 형식 정규식
const expEmailText = /^[A-Za-z0-9\.\-]+@[A-Za-z0-9\.\-]+\.[A-Za-z0-9\.\-]+$/;
// useremail값이 정규식에 부합한지 체크
if(!expEmailText.test(useremail.value)) {
  alert('Please check the format your E-mail.');
  useremail.focus();
  return false;
}
return true;
}

const checkUserid = () => {
// userid, result 변수에 대입
const userid = document.regiform.userid;
const result = document.querySelector('#result');


if(userid.value == '') {
  alert('아이디를 입력해주세요.');
  userid.focus();
  return false;
}
// Ajax를 사용한 userid 중복 체크
const xhr = new XMLHttpRequest();
xhr.onreadystatechange = () => {
  if(xhr.readyState == XMLHttpRequest.DONE) {
      if(xhr.status == 200) {
          let txt = xhr.responseText.trim();
          if(txt == "O") {
              result.style.display = "block";
              result.style.color = "green";
              result.innerHTML = "사용할 수 있는 아이디 입니다.";
          } else {
              result.style.display = "block";
              result.style.color = "red";
              result.innerHTML = "중복된 아이디 입니다.";
              userid.focus();
              // 키 입력 시 result 숨김 이벤트
              userid.addEventListener("keydown", function(){
                  result.style.display = "none";
              });
          }
      }
  }
}
xhr.open("GET", "checkId_ok.php?userid="+userid.value, true);
xhr.send();
}
