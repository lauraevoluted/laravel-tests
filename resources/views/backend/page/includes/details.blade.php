<div class="row">
    <div class="col-lg-6">
        <div class="form-group row">
            <label for="title" class="col-lg-2 col-form-label">
                @lang('Title') <i class="fa fa-asterisk" aria-hidden="true"></i>
            </label>

            <div class="col-lg-10">
                <input type="text" name="title" id="title" class="form-control"
                       value="{{ old('title', optional($page)->title) }}" required />
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group row">
            <label for="content" class="col-lg-2 col-form-label">
                @lang('Content') <i class="fa fa-asterisk" aria-hidden="true"></i>
            </label>

            <div class="col-lg-10">
                <textarea
                    name="content"
                    id="content"
                    class="form-control"
                    required
                >{{ old('content', optional($page)->content) }}</textarea>
            </div>
        </div>
    </div>
</div>
