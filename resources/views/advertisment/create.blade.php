@extends('layout.app')
@section('body_class','page-template-default page page-id-6 logged-in admin-bar no-customize-support wp-custom-logo rtcl-form-page rtcl-page rtcl-no-js ehf-header ehf-footer ehf-template-classima ehf-stylesheet-classima header-style-2 footer-style-1 banner-enabled no-sidebar elementor-default elementor-kit-2161 elementor-page elementor-page-6')

@section('content')
<div id="primary" class="content-area classima-listing-archive rtcl h-100">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-12">
        <div class="site-content-block">
          <div class="main-content">
            <div id="post-6" class="post-6 page type-page status-publish">

              <div data-elementor-type="wp-page" data-elementor-id="6"
                class="elementor elementor-6" data-elementor-post-type="page">
                <section
                  class="elementor-section elementor-top-section elementor-element elementor-element-66fc0f66 elementor-section-boxed elementor-section-height-default elementor-section-height-default rt-parallax-bg-no"
                  data-id="66fc0f66" data-element_type="section">
                  <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5e4d1b36"
                      data-id="5e4d1b36" data-element_type="column">
                      <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-32d7563a elementor-widget elementor-widget-shortcode"
                          data-id="32d7563a" data-element_type="widget"
                          data-widget_type="shortcode.default">
                          <div class="elementor-widget-container">
                            <div class="elementor-shortcode">
                              <div class="rtcl">
                                <form method="POST" id="ads_form" enctype="multipart/form-data">
                                  @csrf
                                  <div
                                  class="rtcl-listing-info-selecting classima-form">
                                  <div id="rtcl-ad-type-selection">
                                    <div
                                      class="classified-listing-form-title">
                                      <i class="fa fa-tags"
                                        aria-hidden="true"></i>
                                      <h3>Select Type</h3>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-3 col-12">
                                        <label class="control-label">Ad
                                          Type<span> *</span></label>
                                      </div>
                                      <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                          <select
                                            class="rtcl-select2 form-control"
                                            id="rtcl-ad-type"
                                            name="type" required>
                                            <option value="">
                                              --Select Type--
                                            </option>
                                            <option
                                              value='sale'>For
                                              Sale</option>
                                            <option
                                              value='rent'>For
                                              Rent</option>
                                            <option
                                              value='instead'>
                                              For Exchange
                                            </option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div id="rtcl-ad-category-selection"
                                   >
                                    <div
                                      class="classified-listing-form-title">
                                      <i class="fa fa-tags"
                                        aria-hidden="true"></i>
                                      <h3>Select Category</h3>
                                    </div>
                                    <div class="rtcl-post-category">

                                      <div class="row" id="cat-row">
                                        <div class="col-sm-3 col-12">
                                          <label
                                            class="control-label">Category<span>
                                              *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                          <div class="form-group">
                                            <select
                                              class="rtcl-select2 form-control"
                                              id="rtcl-category"
                                              name="category"
                                              onchange="getCategory()"
                                              required>
                                              <option value="">
                                                Select a Category
                                              </option>
                                              <option value='chalet'>
                                                Chalets</option>
                                              <option value='commercial'>
                                                Commercial
                                                Buildings
                                              </option>
                                              <option value='commercial_units'>
                                                Commercial Units
                                              </option>
                                              <option value='farm'>
                                                Farms</option>
                                              <option value='industrial'>
                                                Industrial
                                              </option>
                                              <option value='investment'>
                                                Investment
                                                Properties
                                              </option>
                                             
                                              <option value='lands'>Lands</option>
                                              <option value='residential'>
                                                Residential
                                              </option>
                                            </select>
                                          </div>
                                        </div>
                                      </div>


                                      <div class="row d-none"
                                        id="sub-cat-row">
                                        <div class="col-sm-3 col-12">
                                          <label
                                            class="control-label">Sub
                                            Category<span>
                                              *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12"
                                          id="rtcl-sub-category-wrap">
                                          <div class="form-group">
                                            <select name="category_id" class="rtcl-select2 form-control" id="category_id" onchange="applyForm()">
                                            
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-sm-3 col-12">
                                          <label
                                            class="control-label">Select
                                            Location<span>
                                              *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                          <div class="form-group">
                                            <select id="rtcl-sub-sub-location" name="area_id"
                                              class="rtcl-select2 rtcl-select form-control rtcl-map-field" required>
                                              <option value="">
                                                --Select
                                                Location--
                                              </option>
                                              @foreach ($areas as $area )
                                              <option value="{{$area->id}}">{{ app()->getLocale() === 'en' ? $area->name_en : $area->name_ar}}
                                              </option>
                                              @endforeach
                                    
                                            </select>
                                          </div>
                                        </div>
                                       
                                      </div>


                                      <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                                      <div class="row">
                                        <div class="col-md-9" id="form-content">

                                        </div>

                                      </div>

                                    </div>
                                  </div>
                                </div>
                              </form>
                              
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
   
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{asset('assets/js/create.js')}}"></script>
<script>
  	function getCategory() {
        let category = $("#rtcl-category").find(":selected").val();
        let subCat = $("#sub-cat-row");
        $.ajax({
            type: 'GET',
            url: `{{route('get.category.type')}}?category=${category}`,
            success: function(data) {
                $("#sub-cat-row").removeClass('d-none');
                $("#category_id").html(data);
            },
            error: function(error) {
                console.log('error');
            }
        });
    }
</script>

<script>
  let content = document.getElementById('form-content')
        
  function applyForm()
  {
    let category = $("#rtcl-category").find(":selected").val() 
    console.log(category);
        if(category == 'industrial' || category == 'farm' || category == 'break' || category == 'lands')
        {
            content.replaceChildren();
            content.innerHTML = `
<div class="rtcl-post-details rtcl-post-section rtcl-post-section-info">
	<div class="classified-listing-form-title">
		<i class="fa fa-folder-open" aria-hidden="true"></i>
		<h3>Product Information</h3>
	</div>
	<div class="row classima-form-title-row">
		<div class="col-sm-3 col-12">
			<label class="control-label">Title<span>
					*</span></label>
		</div>
		<div class="col-sm-9 col-12">
			<div class="form-group">
				<input type="text" data-max-length="3" maxlength="30" class="form-control" value="" name="title"
					id="rtcl-title" name="title" required />
				<div class="rtcl-hints">
					Character limit
					<span class='target-limit'>30</span>
				</div>
			</div>
		</div>
	</div>
	<div id="rtcl-pricing-wrap">
		<div id="rtcl-pricing-items" class="rtcl-pricing-price">
			<div id="rtcl-price-items" class="rtcl-pricing-item">
				<div class="rtcl-price-item" id="rtcl-price-wrap">
					<div class="price-wrap">
						<div class="row">
							<div class="col-md-3 col-12">
								<label class="control-label">
									<span class="price-label">Price
										[<span class="rtcl-currency-symbol">&#x62f;.&#x643;</span>]</span>
									<span>
										*</span>
								</label>
							</div>
							<div class="col-md-9 col-12">
								<div class="form-group">
									<input type="text" class="form-control" value="" name="price" id="rtcl-price"
										required>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
							<div class="col-md-3 col-12">
								<label class="control-label">
									<span class="price-label"> Link Number
										</span>
									<span>
										*</span>
								</label>
							</div>
							<div class="col-md-9 col-12">
								<div class="form-group">
									<input type="number" class="form-control" value="" name="number" id="rtcl-price"
										required>
								</div>
							</div>
				</div>
				<div class="row" id="rtcl-price-unit-wrap">
					<div class="col-12 col-sm-3">
						<label class="control-label">Price
							Unit</label>
					</div>
					<div class="col-12 col-sm-9">
						<div class="form-group">
							<select class="form-control rtcl-select2" id="rtcl-price-unit" name="_rtcl_price_unit">
								<option value="">
									No
									unit
								</option>
								<option value="total">
									Total
									Price
									(total
									price)</label>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="rtcl-custom-fields-list" data-post_id="0">
		<div class="row rtcl-cf-wrap" data-id="_field_2820" data-type="number">
			<div class="col-12 col-sm-3">
				<label for="rtcl_number_2820" class="control-label rtcl-cf-label">Land
					Area<span>
						*</span></label>
			</div>
			<div class="col-12 rtcl-cf-field-wrap col-sm-9">
				<div class="form-group">
					<input type="number" class="rtcl-number form-control rtcl-cf-field" id="rtcl_number_2820"
						name="space" placeholder="" value="" step="any" min="0" required />
					<div class='help-block with-errors'>
					</div>
					<small class='help-block'>Land
						Area</small>
				</div>
			</div>
		</div>
		<div class="row rtcl-cf-wrap" data-id="_field_2821" data-type="radio">
			<div class="col-12 col-sm-3">
				<label for="rtcl_radio_2821" class="control-label rtcl-cf-label">Features<span>
						*</span></label>
			</div>
			<div class="col-12 rtcl-cf-field-wrap col-sm-9">
				<div class="form-group">
					<div class="rtcl-check-list">
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_radio_2821option-title-1"
								type="radio" name="advantages[]" value="One Street" checked="checked"
								required><label class="form-check-label" for="rtcl_radio_2821option-title-1">One
								Street</label>
						</div>
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_radio_2821option-title-2"
								type="radio" name="advantages[]" value="Two
								Street" required><label
								class="form-check-label" for="rtcl_radio_2821option-title-2">Two
								Street</label>
						</div>
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_radio_2821option-title-3"
								type="radio" name="advantages[]" value="Two
								Street" required><label
								class="form-check-label" for="rtcl_radio_2821option-title-3">Two
								Street
								Corner</label>
						</div>
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_radio_2821option-title-4"
								type="radio" name="advantages[]" value="option-title-4" required><label
								class="form-check-label" for="rtcl_radio_2821option-title-4">Three
								Street</label>
						</div>
					</div>
					<div class='help-block with-errors'>
					</div>
					<small class='help-block'>Features</small>
				</div>
			</div>
		</div>
		<div class="row rtcl-cf-wrap" data-id="_field_2822" data-type="checkbox">
			<div class="col-12 col-sm-3">
				<label for="rtcl_checkbox_2822" class="control-label rtcl-cf-label">feat</label>
			</div>
			<div class="col-12 rtcl-cf-field-wrap col-sm-9">
				<div class="form-group">
					<div class="rtcl-check-list">
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_checkbox_2822option-title-1"
								type="checkbox" name="advantages[]" value="Near
								Services" data-foo='yes'><label
								class="form-check-label" for="rtcl_checkbox_2822option-title-1">Near
								Services</label>
						</div>
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_checkbox_2822option-title-2"
								type="checkbox" name="advantages[]" value="Near
								School" data-foo='yes'><label
								class="form-check-label" for="rtcl_checkbox_2822option-title-2">Near
								School</label>
						</div>
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_checkbox_2822option-title-3"
								type="checkbox" name="advantages[]" value="Near
								Exit" data-foo='yes'><label
								class="form-check-label" for="rtcl_checkbox_2822option-title-3">Near
								Exit</label>
						</div>
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_checkbox_2822option-title-4"
								type="checkbox" name="advantages[]" value="option-title-4" data-foo='yes'><label
								class="form-check-label" for="rtcl_checkbox_2822option-title-4">Near
								Mosque</label>
						</div>
					</div>
					<div class='help-block with-errors'>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row classima-form-des-row">
		<div class="col-sm-3 col-12">
			<label class="control-label">Description</label>
		</div>
		<div class="col-sm-9 col-12">
			<div class="form-group">
				<div id="wp-description-wrap" class="wp-core-ui wp-editor-wrap tmce-active">

					<div id="wp-description-editor-tools" class="wp-editor-tools hide-if-no-js">
						<div class="wp-editor-tabs">
							<button type="button" id="description-tmce" class="wp-switch-editor switch-tmce"
								data-wp-editor-id="description">Visual</button>
							<button type="button" id="description-html" class="wp-switch-editor switch-html"
								data-wp-editor-id="description">Text</button>
						</div>
					</div>
					<div id="wp-description-editor-container" class="wp-editor-container">
						<div id="qt_description_toolbar" class="quicktags-toolbar hide-if-no-js">
						</div>
						<textarea class="wp-editor-area" style="height: 200px" autocomplete="off" cols="40"
							name="description" id="description"></textarea>
					</div>
				</div>

				<div class="rtcl-hints">
					Character limit
					<span class='target-limit'>50</span>
				</div>
			</div>
		</div>
	</div>


</div>


<div class="rtcl-post-gallery rtcl-post-section">
	<div class="classified-listing-form-title">
		<i class="fa fa-image" aria-hidden="true"></i>
		<h3>Images</h3>
	</div>

	<div class="form-group">
		<div id="rtcl-gallery-upload-ui-wrapper" class="rtcl-browser-frontend">
			<input type="file" name="images[]" class="form-control" multiple id="">

			<div class="rtcl-gallery-uploads">
			</div>
			<div class="description alert alert-danger">
				<p>Recommended image
					size to
					(870x493)px</p>
				<p>Image maximum
					size 3 MB.</p>
				<p>Allowed image
					type (png, jpg,
					jpeg).</p>
				<p>You can upload up
					to 5 images.</p>
			</div>

		</div>
	</div>

</div>
<div class="rtcl-post-contact-details rtcl-post-section">
	<div class="classified-listing-form-title">
		<i class="fa fa-user" aria-hidden="true"></i>
		<h3>Contact Details</h3>
	</div>

	

	<div class="row  rtcl-hide" id="sub-sub-location-row">
		<div class="col-12 col-sm-3">
			<label class="control-label">Block<span>
					*</span></label>
		</div>
			</div>

</div>
<div class="rtcl-listing-terms-conditions">
	<div class="row">
		<div class="col-sm-3 col-12">
		</div>
		<div class="col-sm-9 col-12">
			<div class="form-group">
				<div class="form-check">
					<input type="checkbox" class="form-check-input" name="rtcl_agree" id="rtcl-terms-conditions"
						required>
					<label class="form-check-label" for="rtcl-terms-conditions">
						I have read
						and agree to
						the website
						<a href="https://codedhosting.com/alfuraij/my-account/" class="rtcl-terms-and-conditions-link"
							target="_blank">terms
							and
							conditions</a>.
					</label>
					<div class="with-errors help-block" data-error="This field is required">
					</div>
				</div>
			</div>
		</div>
	</div>
  		<button type="submit" class="btn btn-primary rtcl-submit-btn">
			Submit		</button>
</div>
            `;
        }else if(category == 'residential' || category == 'chalet' )
        {
          content.replaceChildren();
          content.innerHTML = `
          <div class="rtcl-post-details rtcl-post-section rtcl-post-section-info">
	<div class="classified-listing-form-title">
		<i class="fa fa-folder-open" aria-hidden="true"></i>
		<h3>Product Information</h3>
	</div>
	<div class="row classima-form-title-row">
		<div class="col-sm-3 col-12">
			<label class="control-label">Title<span>
					*</span></label>
		</div>
		<div class="col-sm-9 col-12">
			<div class="form-group">
				<input type="text" data-max-length="3" maxlength="30" class="form-control" value="" id="rtcl-title"
					name="title" required />
				<div class="rtcl-hints">
					Character limit
					<span class='target-limit'>30</span>
				</div>
			</div>
		</div>
	</div>
	<div id="rtcl-pricing-wrap">
		<div class="row" id="rtcl-form-pricing-type-wrap">
			<div class="col-sm-3 col-12">
				<label class="control-label">Pricing</label>
			</div>
			
		</div>
		<div id="rtcl-pricing-items" class="rtcl-pricing-price">
			<div id="rtcl-price-items" class="rtcl-pricing-item">
				<div class="rtcl-price-item" id="rtcl-price-wrap">
					<div class="price-wrap">
						<div class="row">
							<div class="col-md-3 col-12">
								<label class="control-label">
									<span class="price-label">Price
										[<span class="rtcl-currency-symbol">&#x62f;.&#x643;</span>]</span>
									<span>
										*</span>
								</label>
							</div>
							<div class="col-md-9 col-12">
								<div class="form-group">
									<input type="text" class="form-control" value="" name="price" id="rtcl-price"
										required>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<div class="row" id="rtcl-price-unit-wrap">
					<div class="col-12 col-sm-3">
						<label class="control-label">Price
							Unit</label>
					</div>
					<div class="col-12 col-sm-9">
						<div class="form-group">
							<select class="form-control rtcl-select2" id="rtcl-price-unit" name="_rtcl_price_unit">
								<option value="">
									No
									unit
								</option>
								<option value="total">
									Total
									Price
									(total
									price)</label>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="rtcl-custom-fields-list" data-post_id="0">
		<div class="row rtcl-cf-wrap" data-id="_field_2820" data-type="number">
			<div class="col-12 col-sm-3">
				<label for="rtcl_number_2820" class="control-label rtcl-cf-label">Land
					Area<span>
						*</span></label>
			</div>
			<div class="col-12 rtcl-cf-field-wrap col-sm-9">
				<div class="form-group">
					<input type="number" class="rtcl-number form-control rtcl-cf-field" id="rtcl_number_2820"
						name="space" placeholder="" value="" step="any" min="0" required />
					<div class='help-block with-errors'>
					</div>
					<small class='help-block'>Land
						Area</small>
				</div>
			</div>
		</div>
		<div class="row rtcl-cf-wrap" data-id="_field_2821" data-type="radio">
			<div class="col-12 col-sm-3">
				<label for="rtcl_radio_2821" class="control-label rtcl-cf-label">Features<span>
						*</span></label>
			</div>
			<div class="col-12 rtcl-cf-field-wrap col-sm-9">
				<div class="form-group">
					<div class="rtcl-check-list">
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_radio_2821option-title-1"
								type="radio" name="advantages[]" value=">One
								Street" checked="checked"
								required><label class="form-check-label" for="rtcl_radio_2821option-title-1">One
								Street</label>
						</div>
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_radio_2821option-title-2"
								type="radio" name="advantages[]" value="Two Street" required><label
								class="form-check-label" for="rtcl_radio_2821option-title-2">Two
								Street</label>
						</div>
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_radio_2821option-title-3"
								type="radio" name="advantages[]" value="Two Street Corner" required><label
								class="form-check-label" for="rtcl_radio_2821option-title-3">Two
								Street
								Corner</label>
						</div>
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_radio_2821option-title-4"
								type="radio" name="advantages[]" value="Three Street" required><label
								class="form-check-label" for="rtcl_radio_2821option-title-4">Three
								Street</label>
						</div>
					</div>
					<div class='help-block with-errors'>
					</div>
					<small class='help-block'>Features</small>
				</div>
			</div>
		</div>
		<div class="row rtcl-cf-wrap" data-id="_field_2822" data-type="checkbox">
			<div class="col-12 col-sm-3">
				<label for="rtcl_checkbox_2822" class="control-label rtcl-cf-label">feat</label>
			</div>
			<div class="col-12 rtcl-cf-field-wrap col-sm-9">
				<div class="form-group">
					<div class="rtcl-check-list">
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_checkbox_2822option-title-1"
								type="checkbox" name="advantages[]" value="Near Services"
								data-foo='yes'><label class="form-check-label"
								for="rtcl_checkbox_2822option-title-1">Near
								Services</label>
						</div>
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_checkbox_2822option-title-2"
								type="checkbox" name="advantages[]" value="Near School"
								data-foo='yes'><label class="form-check-label"
								for="rtcl_checkbox_2822option-title-2">Near
								School</label>
						</div>
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_checkbox_2822option-title-3"
								type="checkbox" name="advantages[]" value="Near Exit"
								data-foo='yes'><label class="form-check-label"
								for="rtcl_checkbox_2822option-title-3">Near
								Exit</label>
						</div>
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_checkbox_2822option-title-4"
								type="checkbox" name="advantages[]" value="Near Mosque"
								data-foo='yes'><label class="form-check-label"
								for="rtcl_checkbox_2822option-title-4">Near
								Mosque</label>
						</div>
					</div>
					<div class='help-block with-errors'>
					</div>
				</div>
			</div>
		</div>
		<div class="row rtcl-cf-wrap" data-id="_field_2824" data-type="number">
			<div class="col-12 col-sm-3">
				<label for="rtcl_number_2824" class="control-label rtcl-cf-label">Room
					#<span>
						*</span></label>
			</div>
			<div class="col-12 rtcl-cf-field-wrap col-sm-9">
				<div class="form-group">
					<input type="number" class="rtcl-number form-control rtcl-cf-field" id="rtcl_number_2824"
						name="num_of_rooms" placeholder="" value="" step="any" min="0" required />
					<div class='help-block with-errors'>
					</div>
				</div>
			</div>
		</div>
		<div class="row rtcl-cf-wrap" data-id="_field_2825" data-type="number">
			<div class="col-12 col-sm-3">
				<label for="num_of_bath" class="control-label rtcl-cf-label">Bathrooms
					#<span>
						*</span></label>
			</div>
			<div class="col-12 rtcl-cf-field-wrap col-sm-9">
				<div class="form-group">
					<input type="number" class="rtcl-number form-control rtcl-cf-field" id="num_of_bath"
						name="num_of_bath" placeholder="" value="" step="any" min="0" required />
					<div class='help-block with-errors'>
					</div>
				</div>
			</div>
		</div>
		<div class="row rtcl-cf-wrap" data-id="_field_2826" data-type="checkbox">
			<div class="col-12 col-sm-3">
				<label for="rtcl_checkbox_2826" class="control-label rtcl-cf-label">Features<span>
						*</span></label>
			</div>
			<div class="col-12 rtcl-cf-field-wrap col-sm-9">
				<div class="form-group">
					<div class="rtcl-check-list">
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_checkbox_2826option-title-1"
								type="checkbox" name="advantages[]" value=">Maids Room" data-foo='yes'
								required><label class="form-check-label" for="rtcl_checkbox_2826option-title-1">Maids
								Room</label>
						</div>
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_checkbox_2826option-title-2"
								type="checkbox" name="advantages[]" value="Gym" data-foo='yes'
								required><label class="form-check-label"
								for="rtcl_checkbox_2826option-title-2">Gym</label>
						</div>
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_checkbox_2826option-title-3"
								type="checkbox" name="advantages[]" value="Pool" data-foo='yes'
								required><label class="form-check-label"
								for="rtcl_checkbox_2826option-title-3">Pool</label>
						</div>
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_checkbox_2826option-title-4"
								type="checkbox" name="advantages[]" value="Balcony" data-foo='yes'
								required><label class="form-check-label"
								for="rtcl_checkbox_2826option-title-4">Balcony</label>
						</div>
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_checkbox_2826option-title-5"
								type="checkbox" name="advantages[]" value="Parking" data-foo='yes'
								required><label class="form-check-label"
								for="rtcl_checkbox_2826option-title-5">Parking</label>
						</div>
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_checkbox_2826option-title-6"
								type="checkbox" name="advantages[]" value="Elevator" data-foo='yes'
								required><label class="form-check-label"
								for="rtcl_checkbox_2826option-title-6">Elevator</label>
						</div>
						<div class="form-check">
							<input class="form-check-input rtcl-cf-field" id="rtcl_checkbox_2826option-title-7"
								type="checkbox" name="advantages[]" value="Store" data-foo='yes'
								required><label class="form-check-label"
								for="rtcl_checkbox_2826option-title-7">Store</label>
						</div>
					</div>
					<div class='help-block with-errors'>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row classima-form-des-row">
		<div class="col-sm-3 col-12">
			<label class="control-label">Description</label>
		</div>
		<div class="col-sm-9 col-12">
			<div class="form-group">
				<div id="wp-description-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
					<link rel='stylesheet' id='editor-buttons-css'
						href='https://codedhosting.com/alfuraij/wp-includes/css/editor.min.css?ver=6.4.2'
						type='text/css' media='all' />
					<div id="wp-description-editor-tools" class="wp-editor-tools hide-if-no-js">
						<div class="wp-editor-tabs">
							<button type="button" id="description-tmce" class="wp-switch-editor switch-tmce"
								data-wp-editor-id="description">Visual</button>
							<button type="button" id="description-html" class="wp-switch-editor switch-html"
								data-wp-editor-id="description">Text</button>
						</div>
					</div>
					<div id="wp-description-editor-container" class="wp-editor-container">
						<div id="qt_description_toolbar" class="quicktags-toolbar hide-if-no-js">
						</div>
						<textarea class="wp-editor-area" style="height: 200px" autocomplete="off" cols="40"
							name="description" id="description"></textarea>
					</div>
				</div>

				<div class="rtcl-hints">
					Character limit
					<span class='target-limit'>50</span>
				</div>
			</div>
		</div>
	</div>

	<div class="rtcl-post-gallery rtcl-post-section">
		<div class="classified-listing-form-title">
			<i class="fa fa-image" aria-hidden="true"></i>
			<h3>Images</h3>
		</div>
	
		<div class="form-group">
			<div id="rtcl-gallery-upload-ui-wrapper" class="rtcl-browser-frontend">
				<input type="file" name="images[]" class="form-control" multiple id="">
	
				<div class="rtcl-gallery-uploads">
				</div>
				<div class="description alert alert-danger">
					<p>Recommended image
						size to
						(870x493)px</p>
					<p>Image maximum
						size 3 MB.</p>
					<p>Allowed image
						type (png, jpg,
						jpeg).</p>
					<p>You can upload up
						to 5 images.</p>
				</div>
	
			</div>
		</div>
	
	</div>
  		<button type="submit" class="btn btn-primary rtcl-submit-btn">
			Submit		</button>
</div>
          
          `
        }else if(category == 'commercial_units' || category == 'commercial')
        {
          content.replaceChildren();
          content.innerHTML = ` 
          <div class="rtcl-post-details rtcl-post-section rtcl-post-section-info">
	<div class="classified-listing-form-title">
		<i class="fa fa-folder-open" aria-hidden="true"></i>
		<h3>Product Information</h3>
	</div>
	<div class="row classima-form-title-row">
		<div class="col-sm-3 col-12">
			<label class="control-label">Title<span>
					*</span></label>
		</div>
		<div class="col-sm-9 col-12">
			<div class="form-group">
				<input type="text" data-max-length="3" maxlength="30" class="form-control" value="" id="rtcl-title"
					name="title" required />
				<div class="rtcl-hints">
					Character limit
					<span class='target-limit'>30</span>
				</div>
			</div>
		</div>
	</div>
	<div id="rtcl-pricing-wrap">
		<div class="row" id="rtcl-form-pricing-type-wrap">
			<div class="col-sm-3 col-12">
				<label class="control-label">Pricing</label>
			</div>
			
		</div>
		<div id="rtcl-pricing-items" class="rtcl-pricing-price">
			<div id="rtcl-price-items" class="rtcl-pricing-item">
				<div class="rtcl-price-item" id="rtcl-price-wrap">
					<div class="price-wrap">
						<div class="row">
							<div class="col-md-3 col-12">
								<label class="control-label">
									<span class="price-label">Price
										[<span class="rtcl-currency-symbol">&#x62f;.&#x643;</span>]</span>
									<span>
										*</span>
								</label>
							</div>
							<div class="col-md-9 col-12">
								<div class="form-group">
									<input type="text" class="form-control" value="" name="price" id="rtcl-price"
										required>
								</div>
							</div>
						</div>


						
					</div>
				
				</div>
				<div class="row" id="rtcl-price-unit-wrap">
					<div class="col-12 col-sm-3">
						<label class="control-label">Price
							Unit</label>
					</div>
					<div class="col-12 col-sm-9">
						<div class="form-group">
							<select class="form-control rtcl-select2" id="rtcl-price-unit" name="_rtcl_price_unit">
								<option value="">
									No
									unit
								</option>
								<option value="month">
									Month
									(per
									month)</label>
								<option value="total">
									Total
									Price
									(total
									price)</label>
							</select>
						</div>
					</div>
				</div>

				<div class="row">
							<div class="col-md-3 col-12">
								<label class="control-label">
									<span class="price-label"> Link Number
										</span>
									<span>
										*</span>
								</label>
							</div>
							<div class="col-md-9 col-12">
								<div class="form-group">
									<input type="number" class="form-control" value="" name="number" id="rtcl-price"
										required>
								</div>
							</div>
						</div>
			</div>
		</div>
	</div>

	<div id="rtcl-custom-fields-list" data-post_id="0">
	</div>

	<div class="rtcl-post-gallery rtcl-post-section">
		<div class="classified-listing-form-title">
			<i class="fa fa-image" aria-hidden="true"></i>
			<h3>Images</h3>
		</div>
	
		<div class="form-group">
			<div id="rtcl-gallery-upload-ui-wrapper" class="rtcl-browser-frontend">
				<input type="file" name="images[]" class="form-control" multiple id="">
	
				<div class="rtcl-gallery-uploads">
				</div>
				<div class="description alert alert-danger">
					<p>Recommended image
						size to
						(870x493)px</p>
					<p>Image maximum
						size 3 MB.</p>
					<p>Allowed image
						type (png, jpg,
						jpeg).</p>
					<p>You can upload up
						to 5 images.</p>
				</div>
	
			</div>
		</div>
	
	</div>

	<div class="row classima-form-des-row">
		<div class="col-sm-3 col-12">
			<label class="control-label">Description</label>
		</div>
		<div class="col-sm-9 col-12">
			<div class="form-group">
				<div id="wp-description-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
					<link rel='stylesheet' id='editor-buttons-css'
						href='https://codedhosting.com/alfuraij/wp-includes/css/editor.min.css?ver=6.4.2'
						type='text/css' media='all' />
					<div id="wp-description-editor-tools" class="wp-editor-tools hide-if-no-js">
						<div class="wp-editor-tabs">
							<button type="button" id="description-tmce" class="wp-switch-editor switch-tmce"
								data-wp-editor-id="description">Visual</button>
							<button type="button" id="description-html" class="wp-switch-editor switch-html"
								data-wp-editor-id="description">Text</button>
						</div>
					</div>
					<div id="wp-description-editor-container" class="wp-editor-container">
						<div id="qt_description_toolbar" class="quicktags-toolbar hide-if-no-js">
						</div>
						<textarea class="wp-editor-area" style="height: 200px" autocomplete="off" cols="40"
							name="description" id="description"></textarea>
					</div>
				</div>

				<div class="rtcl-hints">
					Character limit
					<span class='target-limit'>50</span>
				</div>
			</div>
		</div>
	</div>

  		<button type="submit" class="btn btn-primary rtcl-submit-btn">
			Submit		</button>
</div>
          `
        }
    }
</script>
@endsection