@extends('layouts.layout')
@auth
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Account</div>

                    <div class="panel-body">
                        <form class="form-horizontal" name="form" action="" method="get" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="first_name" class="col-md-4 control-label">First Name</label>
                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{Auth::user()->first_name }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="last_name" class="col-md-4 control-label">Last Name</label>
                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ Auth::user()->last_name  }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email  }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="birthdate" class="col-md-4 control-label">Birth Date</label>
                                <div class="col-md-6">
                                <input id="birthdate" type="date" class="form-control" name="birthdate" value="{{ Auth::user()->birthdate  }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone_number" class="col-md-4 control-label">Phone Number</label>
                                <div class="col-md-6">
                                    <input if="phone_number" type="text" class="form-control" name="phone_number" value="{{ Auth::user()->phone_number }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="field" class="col-md-4 control-label">Field</label>
                                <div class="col-md-6">
                                    <input id="field" type="text" class="form-control" name="field" value="{{ Auth::user()->field  }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="biography" class="col-md-4 control-label">Biography</label>
                                <div class="col-md-6">
                                    <textarea id="biography" class="form-control" rows="5" name="biography" required autofocus>{{ Auth::user()->biography }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
if(isset($_GET['first_name']) && !empty($_GET['first_name'])) {
    $servername = "mysql.db.eluthas.com";
    $username = "mules";
    $password = "aG9j^9WbQrxCn&W";
    $dbname = "cody_dement_mules";

    $conn = new mysqli($servername, $username, $password, $dbname);

$first_name = $conn->real_escape_string($_GET['first_name']);
$last_name = $conn->real_escape_string($_GET['last_name']);
$email = $conn->real_escape_string($_GET['email']);
$birthdate = $conn->real_escape_string($_GET['birthdate']);
$phone_number = $conn->real_escape_string($_GET['phone_number']);
$field = $conn->real_escape_string($_GET['field']);
$biography = $conn->real_escape_string($_GET['biography']);

$sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email', updated_at='".time()."', birthdate='$birthdate', phone_number='$phone_number', field='$field', biography='$biography' WHERE id=" . Auth::id();

if ($conn->query($sql) === TRUE) {
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
    $conn->close();
    header('Location: /account/'.Auth::id());
    exit();
}
?>

@endsection
@else
    <?php
    header('Location: /login');
    exit();
    ?>
@endauth