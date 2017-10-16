@extends('layouts.layout')

@section('content')

<div><div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Resume Builder</div>

                        <div class="panel-body">

                            <form class="form-horizontal" name="userInfo" onsubmit="createPDF()">
                                <div class="form-group">
                                    <label for="fname"class="col-md-4 control-label">First Name</label>
                                    <div class="col-md-6">
                                        <input class="form-control"type="text" id="fname" name="firstname" placeholder="Your first name.." value="@auth {{Auth::user()->first_name }} @endauth">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="lname"class="col-md-4 control-label">Last Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="lname"class="form-control" name="lastname" placeholder="Your last name.." value="@auth {{Auth::user()->last_name }} @endauth">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="address"class="col-md-4 control-label">Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="address" name="address"class="form-control" placeholder="Your home address.." value="@auth {{Auth::user()->address }} @endauth">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="city"class="col-md-4 control-label">City</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" id="city" name="city" placeholder="Your city.." value="@auth {{Auth::user()->city }} @endauth">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="state"class="col-md-4 control-label">State</label>
                                    <div class="col-md-6">

                                        <select id="state" name="state" class="form-control">
                                            <option value="KS">Kansas</option>
                                            <option value="MO">Missouri</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="zipcode"class="col-md-4 control-label">Zip Code</label>

                                    <div class="col-md-6">
                                        <input type="text" id="zcode" class="form-control" name="zipcode" placeholder="Your zip code.." value="@auth {{Auth::user()->zip_code }} @endauth">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone"class="col-md-4 control-label">Phone</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="tel" id="phone" name="phone" placeholder="Your cell phone.." value="@auth {{Auth::user()->phone }} @endauth">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email"class="col-md-4 control-label">Email</label>
                                    <div class="col-md-6">
                                        <input type="email" id="email" class="form-control" name="email" placeholder="Your email.." value="@auth {{Auth::user()->email }} @endauth">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="competencies"class="col-md-4 control-label">Competencies</label>
                                    <div class="col-md-6">
                                        <input type="text" id="competency1" name="competency1" class="form-control" placeholder="Your first competency..">
                                        <input type="text" id="competency2" name="competency2" class="form-control" placeholder="Your second competency..">
                                        <input type="text" id="competency3" name="competency3" class="form-control" placeholder="Your third competency..">
                                        <input type="text" id="competency4" name="competency4" class="form-control" placeholder="Your fourth competency..">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="company"class="col-md-4 control-label">Company</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" id="company" name="company" placeholder="The company..">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="title"class="col-md-4 control-label">Title</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" id="title" name="title" placeholder="Your job's title..">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="startdate"class="col-md-4 control-label">Start Date</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" id="sdate" name="startdate">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="enddate" class="col-md-4 control-label">End Date</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" id="edate" name="enddate">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="competencies" class="col-md-4 control-label">Responsibilities</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" id="responsibility1" name="responsibility1" placeholder="Your first responsibility..">
                                        <input class="form-control" type="text" id="responsibility2" name="responsibility2" placeholder="Your second responsibility..">
                                        <input class="form-control" type="text" id="responsibility3" name="responsibility3" placeholder="Your third responsibility..">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <input type="submit" class=     "btn btn-primary" value="Submit">
                                    </div>
                                </div>

                            </form>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
<script type="text/javascript">
    function createPDF() {
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

        doc.save(firstname + lastname + '.pdf');
    }
</script>

@endsection
