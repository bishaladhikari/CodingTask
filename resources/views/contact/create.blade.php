@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class=" row m-t-40">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-body">
                        <form action="{{route('contact.store')}}" method="POST">
                            <div class="form-group">

                                <label><span>First Name</span><span class="required">*</span></label>
                                <input type="text" name="firstname" class="form-control"
                                       placeholder="Enter your First Name" value="{{old('firstname')}}">
                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label><span>Last Name</span><span class="required">*</span></label>
                                <input type="text" name="lastname" class="form-control"
                                       placeholder="Enter your Last Name" value="{{old('lastname')}}">
                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label><span>Email</span><span class="required">*</span></label>
                                <input type="email" name="email" class="form-control"
                                       placeholder="Enter your Email" value="{{old('email')}}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label >Gender</label>
                                    <select class="form-control" name="gender">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control"
                                           placeholder="Enter your Phone no" value="{{old('phone')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label >Address</label>
                                    <input type="text" name="Address" class="form-control"
                                           placeholder="Enter your Address" value="{{old('Address')}}">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Nationality</label>
                                    <input type="text" name="nationality" class="form-control"
                                           placeholder="Enter your nationality" value="{{old('nationality')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label><span>Education Background</span></label>
                                <textarea rows="4" name="education_background" class="form-control"
                                          placeholder="Enter your Education Background" value="{{old('education_background')}}"></textarea>

                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-4" >Preferred Mode of Contact</label>
                                <div class="form-check col-sm-2">
                                    <label class="checkbox-label">
                                        <input type="radio" name="check" checked value="email"> <span class="label-text">Email</span>
                                    </label>
                                </div>
                                <div class="form-check col-sm-2">
                                    <label class="checkbox-label">
                                        <input type="radio" name="check" value="phone"> <span class="label-text">Phone</span>
                                    </label>
                                </div>
                                <div class="form-check col-sm-2">
                                    <label class="checkbox-label">
                                        <input type="radio" name="check" value="none"> <span class="label-text">none</span>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success m-t-10 pull-right">Save</button>
                            {{csrf_field()}}

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection