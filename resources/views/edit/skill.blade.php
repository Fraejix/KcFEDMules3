@extends('layouts.layout')
@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Skill</div>

                    <?php
                    $skills = DB::table('requirements')->where('id', $data)->get();
                    ?>
                    @foreach($skills as $skill)
                        <div class="panel-body">

                            <form class="form-horizontal" name="form" action="" method="get" >

                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="name" class="form-control" name="name" value="{{$skill->name}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="col-md-4 control-label">Description</label>
                                    <div class="col-md-6">
                                        <input type="text" id="description" class="form-control" name="description" value="{{$skill->description}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="type" class="col-md-4 control-label">Type</label>
                                    <div class="col-md-6">
                                        <select id="type" class="form-control" name="type">
                                            <option value="soft" @if($skill->type === 'soft') selected="selected" @endif>Soft Skill</option>
                                            <option value="hard" @if($skill->type === 'hard') selected="selected" @endif>Hard Skill</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <input type="submit" class="btn btn-primary" value="Update">
                                    </div>
                                </div>

                            </form>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<?php
if(isset($_GET['name']) && !empty($_GET['name'])) {
    $servername = "mysql.db.eluthas.com";
    $username = "mules";
    $password = "aG9j^9WbQrxCn&W";
    $dbname = "cody_dement_mules";

    $conn = new mysqli($servername, $username, $password, $dbname);

$name = $conn->real_escape_string($_GET['name']);
$description = $conn->real_escape_string($_GET['description']);
$type = $conn->real_escape_string($_GET['type']);

$sql = "UPDATE requirements SET name='$name', description='$description', type='$type' WHERE id=" . $data;

if ($conn->query($sql) === TRUE) {
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
    $conn->close();
    header('Location: /skill');
    exit();
}
?>