@if ($errors->any())
    <div class="border border-danger text-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@csrf

<div class="row">
    <div class="form-group col-sm-3">
        <label class="text-capitalize" for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Property title"
        value="@if(isset($property)){{ $property->title }}@else{{ old('title') }}@endif" required>
    </div>
    <div class="form-group col-sm-3">
        <label class="text-capitalize" for="description">Description</label>
        <textarea class="form-control" id="description" name="description" placeholder="Property description"
        required>@if(isset($property)){{ $property->description }}@else{{ old('description') }}@endif</textarea>
    </div>
    <div class="form-group col-sm-3">
        <label class="text-capitalize" for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" placeholder="Property price"
        value="@if(isset($property)){{ $property->price }}@else{{ old('price') }}@endif" required>
    </div>
    <div class="form-group col-sm-3">
    <label class="text-capitalize" for="type">Type</label>
    <select class="form-control" id="type" name="type" required>
        <option value="" disabled @if(!isset($property)) selected @endif>Select type</option>
        <option value="Building" @if(isset($property) && $property->type == 'Building') selected @endif>Building</option>
        <option value="Apartment" @if(isset($property) && $property->type == 'Apartment') selected @endif>Apartment</option>
        <option value="House" @if(isset($property) && $property->type == 'House') selected @endif>House</option>
        <option value="Land" @if(isset($property) && $property->type == 'Land') selected @endif>Land</option>
        <option value="Other" @if(isset($property) && $property->type == 'Other') selected @endif>Other</option>
    </select>
    </div>
    <div class="form-group col-sm-3">
        <label class="text-capitalize" for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Property address"
        value="@if(isset($property)){{ $property->address }}@else{{ old('address') }}@endif" required>
    </div>
    <div class="form-group col-sm-3">
        <label class="text-capitalize" for="bathrooms">Bathrooms</label>
        <input type="number" class="form-control" id="bathrooms" name="bathrooms" placeholder="Number of bathrooms"
        value="@if(isset($property)){{ $property->bathrooms }}@else{{ old('bathrooms') }}@endif" required>
    </div>
    <div class="form-group col-sm-3">
        <label class="text-capitalize" for="bedrooms">Bedrooms</label>
        <input type="number" class="form-control" id="bedrooms" name="bedrooms" placeholder="Number of bedrooms"
        value="@if(isset($property)){{ $property->bedrooms }}@else{{ old('bedrooms') }}@endif" required>
    </div>
    <div class="form-group col-sm-3">
        <label class="text-capitalize" for="area">Area</label>
        <input type="number" class="form-control" id="area" name="area" placeholder="Property area (sq ft)"
        value="@if(isset($property)){{ $property->area }}@else{{ old('area') }}@endif" required>
    </div>
    <div class="form-group col-sm-3">
        <label class="text-capitalize" for="date">Date</label>
        <input type="date" class="form-control" id="date" name="date"
        value="@if(isset($property)){{ $property->date }}@else{{ old('date') }}@endif" required>
    </div>
    <div class="form-group col-sm-3">
        <label class="text-capitalize" for="city">City</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="City"
        value="@if(isset($property)){{ $property->city }}@else{{ old('city') }}@endif" required>
    </div>
    <div class="form-group col-sm-3">
    <label class="text-capitalize" for="images">Images</label>
    <input type="file" class="form-control" id="images" name="images[]" multiple required>
    <small class="form-text text-muted">يمكنك تحميل أكثر من صورة.</small>
</div>
    
    <!-- خريطة لتحديد الموقع -->
    <div class="form-group col-sm-12">
        <label for="map">حدد الموقع على الخريطة</label>
        <div id="map" style="height: 400px;"></div>
    </div>

    <input type="hidden" id="latitude" name="latitude" value="@if(isset($property)){{ $property->latitude }}@else{{ old('latitude') }}@endif">
    <input type="hidden" id="longitude" name="longitude" value="@if(isset($property)){{ $property->longitude }}@else{{ old('longitude') }}@endif">
</div>

<div class="form-group">
    <input type="submit" class="btn btn-success" value="@if(isset($property)) Update @else Create @endif">
    <a class="btn btn-danger ml-3" href="{{ route('property.index') }}">Cancel</a>
</div>

<!-- إضافة مكتبة Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    // إعدادات الخريطة
    var map = L.map('map').setView([15.3694, 44.1910], 8); // إعداد العرض الافتراضي لصنعاء، اليمن
    // إضافة طبقة خريطة
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    // إضافة مؤشر لتحديد الموقع
    var marker = L.marker([31.9686, 35.6372]).addTo(map); // مكان البداية الافتراضية

    // تحديث خطوط الطول والعرض عند النقر على الخريطة
    map.on('click', function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        // تحديث الموقع في المؤشر
        marker.setLatLng([lat, lng]);

        // تعيين القيم في الحقول المخفية
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
    });
</script>