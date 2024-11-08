<?php
$tekst = null;
$afbeelding = null;
$verhouding = null;
$volgorde = null;

$tekst = get_field('tekst');
$afbeelding = get_field('afbeelding');
$verhouding = get_field('verhouding');
$volgorde = get_field('volgorde');
$blocktitle = get_field('block-title');
$hoofdfont = 'your-font-class';

$contentLinks = '';
$contentRechts = '';
$verhoudingGrid = '';
$verhoudingGridSpanLeft = '';
$verhoudingGridSpanRight = '';

if ($verhouding == '50 - 50') {
    $verhoudingGrid = 'grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12';
} elseif ($verhouding == '70 - 30') {
    $verhoudingGrid = 'grid-cols-1 lg:grid-cols-3 gap-8 md:gap-12';
    $verhoudingGridSpanLeft = 'lg:col-span-2';
} elseif ($verhouding == '30 - 70') {
    $verhoudingGrid = 'grid-cols-1 lg:grid-cols-3 gap-8 md:gap-12';
    $verhoudingGridSpanRight = 'lg:col-span-2';
}

if ($volgorde == 'tekst - afbeelding') {
    $containerClass = "relative flex items-center w-full h-full";
    $contentRechtsClass = "relative flex items-center w-full h-full order-1 lg:order-2"; 
    $contentRechts = '<div class="img-wrapper w-full relative overflow-hidden" style="box-shadow: -5px -5px 20px rgb(0 0 0 / 25%);" >';

    $contentRechts .= '<div class="absolute top-[-69px] pb-0 left-0 w-full h-[54px] ' . $hoofdfont . ' text-center  lg: mb-24 z-10 flex items-center justify-center lg:py-0 py-0">' 
        . $blocktitle . '</div>' 
        . wp_get_attachment_image($afbeelding['id'], 'full', "", array("class" => "w-full h-auto object-cover")) 
        . '<div class="svg-overlay absolute inset-0 w-full h-full pointer-events-none">'; // SVG container over the image
        
    $contentRechts .= '<img src="'.get_bloginfo('template_url').'/fa/webfonts/fotorechtslayer.svg" class="w-full h-full object-cover opacity-100" alt="SVG Overlay" />'; // SVG overlay
    $contentRechts .= '</div>'; 
    $contentRechts .= '</div>';

    $contentLinksClass = "relative p-6 flex flex-col items-start w-full  h-full order-2 lg:order-1 lg:justify-center lg: max-w-[653px]  lg:mx-auto";
    $contentLinks = '<div class="text-wrapper py-0 lg:py-0 w-full standaard-content text-base   ">' . $tekst . '</div>';

    $output = '<div class="' . $containerClass . '">' . $contentRechts . $contentLinks . '</div>';
    
}


elseif ($volgorde == 'afbeelding - tekst') {
    $contentLinksClass = "relative  flex flex-col items-start  w-full"; 
    $contentLinks = '<div class="absolute top-[-69px] pb-0 left-0 w-full h-[54px] ' . $hoofdfont . ' text-center text-[24px] lg:text-[40px] z-10 flex items-center justify-center lg:py-0 py-0">' 
    . $blocktitle . '</div>' 
    . '<div class="img-wrapper w-full relative overflow-hidden" style="    box-shadow: 10px 10px 20px rgb(0 0 0 / 25%);">'
    . wp_get_attachment_image($afbeelding['id'], 'full', "", array("class" => "w-full h-auto object-cover")) 
    . '<div class="svg-overlay absolute inset-0 w-full h-full pointer-events-none">'; // SVG container over the image
    $contentLinks .= '<img src="'.get_bloginfo('template_url').'/fa/webfonts/fotolinkslayer.svg" class="w-full h-full object-cover opacity-100" alt="SVG Overlay" />'; // SVG overlay
    $contentLinks .= '</div>'; // Close SVG overlay
    $contentLinks .= '</div>'; // Close img-wrapper

    $contentRechtsClass = "relative p-6 flex flex-col items-start justify-self-center w-full h-full lg:justify-center lg:max-w-[653px]";
    $contentRechts = '<div class="text-wrapper py-0 lg:py-0 mx-auto w-full standaard-content text-base  md: lg: text-left lg:text-left">' . $tekst . '</div>'; 
}

    
if ($tekst): 
?>
 <section class="tekst-afbeelding pt-24 <?php echo ($volgorde == 'afbeelding - tekst') ? 'bg-[#FFFFF0] afbeelding-tekst' : 'my-0'; ?> md:my-0">
    <?php if ($volgorde == 'tekst - afbeelding'): ?>
        <div class="svg absolute left-[59%] transform -translate-x-1/2 bottom-[-3rem] hidden lg:block">
            <svg width="372" height="195" viewBox="0 0 372 195" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M339.616 61.9164C339.616 61.9164 144.5 166.465 96.4579 129.304C96.4579 129.304 58.2752 121.413 111.527 4.68077C113.957 -0.627141 109.852 1.06095 109.852 1.06095C109.864 1.08575 -14.466 87.1884 2.51902 159.573C2.51902 159.573 44.0018 277.813 371.323 78.0407L339.616 61.9164Z" fill="#00AF9B" fill-opacity="0.2"/>
            </svg>
        </div>
    <?php endif; ?>
    
    <div class="container-fluid grid <?php echo $verhoudingGrid; ?>">
        <div class="<?php echo $contentLinksClass; ?> <?php echo $verhoudingGridSpanLeft; ?>">
            <?php echo $contentLinks; ?>
        </div>
        <div class="<?php echo $contentRechtsClass; ?> <?php echo $verhoudingGridSpanRight; ?>">
            <?php echo $contentRechts; ?>
        </div>
    </div>

    <style>
        .afbeelding-tekst::after {
            content: '';
            position: absolute;
            bottom: -20%;
            left: 0;
            width: 100%;
            height: 20%;
            background-color: #FFFFF0; 
            z-index: -1;
        }
    </style>
</section>




<?php 
endif;
?>
