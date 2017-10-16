function createPDF()
{
    var doc = new jsPDF();

    var bullet = '\u2022';

    var firstname = document.forms['userInfo']['fname'].value;
    var lastname = document.forms['userInfo']['lname'].value;
    var address = document.forms['userInfo']['address'].value;
    var city = document.forms['userInfo']['city'].value;
    var state = document.forms['userInfo']['state'].value;
    var zipcode = document.forms['userInfo']['zcode'].value;
    var phone = document.forms['userInfo']['phone'].value;
    var email = document.forms['userInfo']['email'].value;
    var competency1 = document.forms['userInfo']['competency1'].value;
    var competency2 = document.forms['userInfo']['competency2'].value;
    var competency3 = document.forms['userInfo']['competency3'].value;
    var competency4 = document.forms['userInfo']['competency4'].value;
    var company = document.forms['userInfo']['company'].value;
    var title = document.forms['userInfo']['title'].value;
    var startdate = document.forms['userInfo']['startdate'].value;
    var enddate = document.forms['userInfo']['enddate'].value;
    var responsibility1 = document.forms['userInfo']['responsibility1'].value;
    var responsibility2 = document.forms['userInfo']['responsibility2'].value;
    var responsibility3 = document.forms['userInfo']['responsibility3'].value;

    doc.setFont("helvetica");

    doc.setFontSize(24);
    doc.text(105, 15, firstname + ' ' + lastname, null, null, 'center');

    doc.setFontSize(12);
    doc.text(105, 20, address + ', ' + city + ', ' + state + ' ' + zipcode + ' ' + bullet + ' ' + phone + ' ' + bullet + ' ' + email, null, null, 'center');

    doc.setFontSize(14);
    doc.text(11, 30, 'Core Competencies');

    doc.setLineWidth(0.25);
    doc.line(10, 32, 200, 32);

    doc.setFontSize(12);
    doc.text(11, 37, bullet + '    ' + competency1);
    doc.text(105, 37, bullet + '    ' + competency2);
    doc.text(11, 42, bullet + '    ' + competency3);
    doc.text(105, 42, bullet + '    ' + competency4);

    doc.setFontSize(14);
    doc.text(11, 52, 'Work Experience');

    doc.setLineWidth(0.25);
    doc.line(10, 54, 200, 54);

    doc.setFontSize(12);
    doc.text(11, 59, company);
    doc.text(11, 64, title + ', ' + startdate + ' - ' + enddate);
    doc.text(11, 69, bullet + '    ' + responsibility1);
    doc.text(11, 74, bullet + '    ' + responsibility2);
    doc.text(11, 79, bullet + '    ' + responsibility3);

    doc.setFontSize(14);
    doc.text(11, 89, 'Education');

    doc.setLineWidth(0.25);
    doc.line(10, 91, 200, 91);

    doc.setFontSize(12);
    doc.text(11, 96, school);
    doc.text(11, 101, degree + ', ' + graduationdate);
    doc.text(11, 106, bullet + '    ' + accomplishment1);
    doc.text(11, 111, bullet + '    ' + accomplishment2);
    doc.text(11, 116, bullet + '    ' + accomplishment3);

    doc.save(firstname + lastname + '.pdf');
}