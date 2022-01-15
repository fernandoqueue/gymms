<x-central.app-layout>
    <x-slot name="header">
        <h2 class="h3 font-weight-bold">
            Location
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-12">
            <h4 style="display:inline-block">Create New Gym</h4>
        </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div style="border: 1px solid cadetblue" class="card">
          <form action="{{ route('central.dashboard.location.store') }}" method="post">
            @csrf
          <div class="card-body">
            <h5 style="margin-bottom: unset; color:#325556;" class="card-title">Domain Information</h5>
            <p class="card-text text-muted">Enter subdomain for new location. You can create a new domain later.</p>
            <div class="row g-3 mb-4">
              <div class="col-12">
                <label class="visually-hidden" for="inlineFormInputGroupUsername">Domain Name</label>
                <div class="input-group">
                  <input name="domain" type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Subdomain Name">
                  <div class="input-group-text">.{{ config('tenancy.central_domain') }}</div>
                </div>
              </div>
            </div>
            <h5 style="margin-bottom: unset; color:#325556;" class="card-title">Location Information</h5>
            <p class="card-text text-muted">Enter gym details below</p>
            <div class="row g-3 mb-4">
              <div class="col-12">
                <label for="inputEmail4" class="form-label">Name</label>
                <input name="name" type="name" class="form-control" id="inputEmail4" placeholder="Name">
              </div>
              <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input name="address1" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
              </div>
              <div class="col-12">
                <label for="inputAddress2" class="form-label">Address 2</label>
                <input name="address2" type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
              </div>
              <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input name="city" type="text" class="form-control" id="inputCity" placeholder="City">
              </div>
              <div class="col-md-4">
                <label for="inputState" class="form-label">State</label>
                <select name="state" id="inputState" class="form-select">
                  <option selected>Choose...</option>
                  <option value="AL">Alabama</option>
                  <option value="AK">Alaska</option>
                  <option value="AZ">Arizona</option>
                  <option value="AR">Arkansas</option>
                  <option value="CA">California</option>
                  <option value="CO">Colorado</option>
                  <option value="CT">Connecticut</option>
                  <option value="DE">Delaware</option>
                  <option value="DC">District Of Columbia</option>
                  <option value="FL">Florida</option>
                  <option value="GA">Georgia</option>
                  <option value="HI">Hawaii</option>
                  <option value="ID">Idaho</option>
                  <option value="IL">Illinois</option>
                  <option value="IN">Indiana</option>
                  <option value="IA">Iowa</option>
                  <option value="KS">Kansas</option>
                  <option value="KY">Kentucky</option>
                  <option value="LA">Louisiana</option>
                  <option value="ME">Maine</option>
                  <option value="MD">Maryland</option>
                  <option value="MA">Massachusetts</option>
                  <option value="MI">Michigan</option>
                  <option value="MN">Minnesota</option>
                  <option value="MS">Mississippi</option>
                  <option value="MO">Missouri</option>
                  <option value="MT">Montana</option>
                  <option value="NE">Nebraska</option>
                  <option value="NV">Nevada</option>
                  <option value="NH">New Hampshire</option>
                  <option value="NJ">New Jersey</option>
                  <option value="NM">New Mexico</option>
                  <option value="NY">New York</option>
                  <option value="NC">North Carolina</option>
                  <option value="ND">North Dakota</option>
                  <option value="OH">Ohio</option>
                  <option value="OK">Oklahoma</option>
                  <option value="OR">Oregon</option>
                  <option value="PA">Pennsylvania</option>
                  <option value="RI">Rhode Island</option>
                  <option value="SC">South Carolina</option>
                  <option value="SD">South Dakota</option>
                  <option value="TN">Tennessee</option>
                  <option value="TX">Texas</option>
                  <option value="UT">Utah</option>
                  <option value="VT">Vermont</option>
                  <option value="VA">Virginia</option>
                  <option value="WA">Washington</option>
                  <option value="WV">West Virginia</option>
                  <option value="WI">Wisconsin</option>
                  <option value="WY">Wyoming</option>
                </select>
              </div>
              <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input name="zip" placeholder="Zip" type="text" class="form-control" id="inputZip">
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button style="color:white;background-color:cadetblue" type="submit" class="btn btn-lg float-end">Submit</button>
              </div>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
    
</x-central.app-layout>
