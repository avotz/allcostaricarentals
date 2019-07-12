<?php 
$categories = get_terms(array(
	'taxonomy' => 'product_cat',
	'hide_empty' => false

));

$locations = get_terms(array(
	'taxonomy' => 'location',
	'hide_empty' => false

));

$categorySelected = get_query_var('product_cat');
$locationSelected = get_query_var('location');
$q = get_query_var('q');
?>
<form action="<?php echo esc_url(home_url('/properties/?product_cat=' . $categorySelected . '&location=' . $locationSelected.'&q=' . $q)); ?>" class="form-filters flex flex-wrap xl:flex-no-wrap xl:h-75 text-black tracking-wide | js-booking-form">
    <div class="w-full xl:w-auto flex-none xl:flex-auto flex">
        <div class="flex-auto flex flex-col xl:flex-row">
            <div class="w-full xl:w-1/4 xl:flex-none relative">
                <div class="flex flex-col items-center justify-between xl:justify-center w-full h-60 xl:h-60 text-xs uppercase font-bold tracking-wide border-r border-grey-light px-5">
                    <label for="product_cat">Type</label>
                    <select name="product_cat" id="product_cat" class="w-full h-40 px-2 text-lg border-b border-grey-light">
                        <option value="">All</option>
                        <?php foreach ($categories as $cat) : ?>
							<option value="<?php echo $cat->slug ?>" <?php if ($categorySelected == $cat->slug) echo 'selected' ?>><?php echo $cat->name ?></option>
						<?php endforeach; ?>
                    </select>
                </div>
                
            </div>
            <div class="w-full xl:w-1/4 xl:flex-none relative">
                <div class="flex flex-col items-center justify-between xl:justify-center w-full h-60 xl:h-60 text-xs uppercase font-bold tracking-wide border-r border-grey-light px-5">
                    <label for="bedrooms">Bedrooms</label>
                    <input type="number" name="bedrooms" class="w-full h-40 px-2 text-lg border-b border-grey-light" min="1" value="1">
                </div>
            </div>
            <div class="w-full xl:w-1/4 xl:flex-none relative">
                <div
                    class="flex flex-col items-center justify-between xl:justify-center w-full h-60 xl:h-60 text-xs uppercase font-bold tracking-wide border-r border-grey-light px-5">
                    <label for="location">Location or Zone</label>
                    <select name="location" id="location" class="w-full h-40 px-2 text-lg">
                        <option value="">All</option>
                        <?php foreach ($locations as $loc) : ?>
							<option value="<?php echo $loc->slug ?>" <?php if ($locationSelected == $loc->slug) echo 'selected' ?>><?php echo $loc->name ?></option>
						<?php endforeach; ?>
                    
                    </select>
                </div>
            </div>
            <div class="w-full xl:w-1/4 xl:flex-none relative">
                <div
                    class="flex flex-col items-center justify-between xl:justify-center w-full h-60 xl:h-60 text-xs uppercase font-bold tracking-wide px-5">
                    <label for="from">Guests</label>
                    <select name="type" id="type" class="w-full h-10 px-2 text-lg ">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                        <option value="">6</option>
                        <option value="">7</option>
                    </select>
                </div>
            </div>
            
            
        </div>
        
    </div>
    <div class="w-full xl:w-auto flex-none p-2 xl:flex">
        
    
        <button class="flex-none text-white leading-none appearance-none bg-teal-500 hover:bg-blue-800 p-0 px-8 rounded-none border-0 uppercase py-4">Buscar</button>
    </div>

</form>