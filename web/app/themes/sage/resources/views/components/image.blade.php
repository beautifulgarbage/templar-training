@if(substr($src, -4) == '.svg')
    <img
        src="{{ $src }}"
        class="{{ $class }}"
        alt="{{ $alt }}"
        width="{{ $width }}"
        height="{{ $height }}"
        src="{{ glide($src, $preset) }}"
        loading="lazy"
        data-preset="{{ $preset }}-N/A"
    >
@else
    <picture class="{{ $class }}">
        <source
            media="(min-width: 1025px)"
            srcset="{{ glide($srcset, $preset . '-2x-webp') }}"
            data-preset="{{ $preset . '-2x-webp' }}"
            type="image/webp"
        >
        <source
            media="(min-width: 1025px)"
            srcset="{{ glide($srcset, $preset . '-2x') }}"
            data-preset="{{ $preset . '-2x' }}"
            type="image/jpeg"
        >
        <source
            media="(max-width: 1024px)"
            srcset="{{ glide($srcset, $preset . '-webp') }}"
            data-preset="{{ $preset . '-webp' }}"
            type="image/webp"
        >
        <source
            media="(max-width: 1024px)"
            srcset="{{ glide($srcset, $preset) }}"
            data-preset="{{ $preset }}"
            type="image/jpeg"
        >
        <img

            sizes="(max-width: 1024px) 1024px,
                    (max-width: 768px) 768px"

            class="{{ $class }}"

            srcset="{{ glide($srcset, $preset . '-2x') }} 1024w,
                    {{ glide($srcset, $preset) }} 768w"
            src="{{ glide($src, $preset) }}"
            loading="lazy"
            data-preset="{{ $preset }}-N/A"
            alt="{{ $alt }}"
            width="{{ $width }}"
            height="{{ $height }}"
        >
    </picture>
@endif