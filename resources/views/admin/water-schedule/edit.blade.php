@extends('layouts.admin')

@section('title', 'Edit Water Supply Schedule')
@section('page-title', 'Edit Water Supply Schedule')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.water-schedule.update', $waterSchedule) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Area *</label>
                        <input type="text" name="area" class="form-control @error('area') is-invalid @enderror" value="{{ old('area', $waterSchedule->area) }}" required>
                        @error('area')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Ward</label>
                        <input type="text" name="ward" class="form-control" value="{{ old('ward', $waterSchedule->ward) }}">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Day *</label>
                        <select name="day" class="form-select @error('day') is-invalid @enderror" required>
                            <option value="Sunday" {{ old('day', $waterSchedule->day) === 'Sunday' ? 'selected' : '' }}>Sunday</option>
                            <option value="Monday" {{ old('day') === 'Monday' ? 'selected' : '' }}>Monday</option>
                            <option value="Tuesday" {{ old('day') === 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                            <option value="Wednesday" {{ old('day') === 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                            <option value="Thursday" {{ old('day') === 'Thursday' ? 'selected' : '' }}>Thursday</option>
                            <option value="Friday" {{ old('day') === 'Friday' ? 'selected' : '' }}>Friday</option>
                            <option value="Saturday" {{ old('day') === 'Saturday' ? 'selected' : '' }}>Saturday</option>
                        </select>
                        @error('day')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Start Time *</label>
                        <input type="time" name="start_time" class="form-control @error('start_time') is-invalid @enderror" value="{{ old('start_time', $waterSchedule->start_time->format('H:i')) }}" required>
                        @error('start_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">End Time *</label>
                        <input type="time" name="end_time" class="form-control @error('end_time') is-invalid @enderror" value="{{ old('end_time', $waterSchedule->end_time->format('H:i')) }}" required>
                        @error('end_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Remarks (English)</label>
                        <textarea name="remarks_en" class="form-control" rows="3">{{ old('remarks_en', $waterSchedule->remarks_en) }}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Remarks (Nepali)</label>
                        <textarea name="remarks_ne" class="form-control" rows="3">{{ old('remarks_ne', $waterSchedule->remarks_ne) }}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-select" required>
                            <option value="active" {{ old('status', $waterSchedule->status) === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.water-schedule.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
