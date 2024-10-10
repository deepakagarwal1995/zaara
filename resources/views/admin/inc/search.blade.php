@php
$row = $_GET['rows'] ?? '25';
@endphp
<form action="?" method="GET">
    <div class="row row-xs mb-5">
            <div class="col-lg-2 col-4">
           <label for="firstName1">Entries per page</label>
                <select class="form-control" name="rows" onchange="this.form.submit()">
                    <option value="25" {{ $row=='25' ? 'selected' : false }}>25
                    </option>
                    <option value="50" {{ $row=='50' ? 'selected' : false }}>50
                    </option>
                    <option value="100" {{ $row=='100' ? 'selected' : false }}>100
                    </option>
                    <option value="250" {{ $row=='250' ? 'selected' : false }}>250
                    </option>
                    <option value="500" {{ $row=='500' ? 'selected' : false }}>500
                    </option>
                    <option value="all" {{ $row=='all' ? 'selected' : false }}>All
                    </option>
                </select>
        </div>
        <div class="offset-lg-7 col-lg-3 col-8">
            <label for="firstName1">Search</label>
                <div class="search-bar">
                    <input type="search" id="default-search" placeholder="Search" name="keyword" value="{{ $_GET['keyword'] ?? '' }}" class="form-control">
                </div>

        </div>
    </div>
</form>
