
@if($code == 'WithdrawCategory')


    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit This Data <b>Don't leave Empty Fields</b>
            </div>
            <div class="panel-body">
                <input type="hidden" name="id" value="${data.msg.id}">
                    <div class="form-group col-md-4">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="${data.msg.name}" required>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="description">Description:</label>
                        <input type="text" id="description" name="description" class="form-control" value="${data.msg.description}" required>
                    </div>


                    <div class="form-group col-md-12">
                        <div class="pull-rightd">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    @elseif($code == 'PenaltyCategory')


        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit This Data <b>Don't leave Empty Fields</b>
                </div>
                <div class="panel-body">
                    <input type="hidden" name="id" value="${data.msg.id}">
                    <div class="form-group col-md-4">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="${data.msg.name}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="amount">Name:</label>
                        <input type="text" name="amount" id="amount" class="form-control" value="${data.msg.amount}" required>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="description">Description:</label>
                        <input type="text" id="description" name="description" class="form-control" value="${data.msg.description}" required>
                    </div>


                    <div class="form-group col-md-12">
                        <div class="pull-rightd">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    @elseif($code == 'Member')


        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit This Data <b>Don't leave Empty Fields for penalties</b>
                </div>
                <div class="panel-body">
                    <input type="hidden" name="id" value="${data.msg.id}">
                    <div class="form-group col-md-4">
                        <label for="member">Member:</label>
                        <select name="member" class="form-control" id="member" required>
                            @foreach(\App\Models\Member::where("status", 1)->where("active", 1)->get() as $member)
                                <option value="{{ $member->id }}">{{ $member->user->username }}</option>
                              @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-7">
                        <label for="penalty">Penalty:</label>
                        <select name="penalty" class="form-control" id="penalty" required>
                            @foreach(\App\Models\PenaltyCategory::where("status", 1)->where("active", 1)->get() as $penalty)
                                <option value="{{ $penalty->id }}">{{ $penalty->name }}</option>
                              @endforeach
                        </select>
                    </div>



                    <div class="form-group col-md-12">
                        <div class="pull-rightd">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@elseif($code == 'messageToShowloan')
    <div class="jumbotron">
        <ul class="list-group">
            <li class="list-group-item">${d.msg}</li>

        </ul>
    </div>
@elseif($code == 'success')
    <div class="jumbotron">
        <div class="alert alert-success">
            Data Has Been A Success
        </div>
    </div>
@elseif($code == 'errs')
    <div class="jumbotron">
        <div class="alert alert-danger">
            Error Occurred
        </div>
    </div>

@endif