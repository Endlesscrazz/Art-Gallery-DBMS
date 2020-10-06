<HTML>
<HEAD>
<TITLE>Radio Button onClick Handler</TITLE>
<SCRIPT LANGUAGE="JavaScript">
var myOption = false
function initValue() {
    myOption = document.forms[0].songs[3].checked
}
 function fullName(form) {
    for (var i = 0; i < form.songs.length; i++) {
        if (form.songs[i].checked) {
            break
        }
    }
    alert("You chose " + form.songs[i].value + ".")
}
function setShemp(setting) {
    myOption = setting
}
function exitMsg() {
    if (myOption) {
        alert("You like My Option?")
    }
}
</SCRIPT>
</HEAD>
<BODY onLoad="initValue()" onUnload="exitMsg()">
<FORM>
<B>Select your favorite song:</B><P>
<INPUT TYPE="radio" NAME="songs" VALUE="A" CHECKED onClick="setShemp(false)">A
<INPUT TYPE="radio" NAME="songs" VALUE="B" onClick="setShemp(false)">B
<INPUT TYPE="radio" NAME="songs" VALUE="C" onClick="setShemp(false)">C
<INPUT TYPE="radio" NAME="songs" VALUE="D" onClick="setShemp(true)">D<P>
<INPUT TYPE="button" NAME="Viewer" VALUE="View Full Name..." onClick="fullName(this.form)">
</FORM>
</BODY>

<?PHP

$a="hello";

?>
<script>
function echoHello(){
 alert("<?PHP hello(); ?>");
 }
</script>

<?PHP
FUNCTION hello(){
 GLOBAL $a;
 ECHO $a;
 }

?>

<button onclick="echoHello()">Say Hello</button>
</HTML>
