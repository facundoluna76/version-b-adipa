@php use App\Data\CoursesData; @endphp

<article
    class="course-card"
    data-category="{{ $course['category'] }}"
    data-modality="{{ $course['modality'] }}"
    data-price="{{ $course['discount_price'] }}"
    data-rating="{{ $course['rating'] }}"
    data-featured="{{ $course['is_featured'] ? '1' : '0' }}"
    data-new="{{ $course['is_new'] ? '1' : '0' }}"
    data-title="{{ strtolower($course['title']) }}"
    data-instructor="{{ strtolower($course['instructor']) }}"
    data-description="{{ strtolower($course['description']) }}"
    aria-label="Curso: {{ $course['title'] }}"
>
    {{-- Image --}}
    <div class="course-card__image">
        <img
            src="{{ $course['image_url'] }}"
            alt="Imagen del curso {{ $course['title'] }}"
            loading="lazy"
        >
        <div class="course-card__overlay" aria-hidden="true"></div>

        {{-- Top left: modality --}}
        <div class="course-card__badges-top">
            @php
                $modalityClass = match($course['modality']) {
                    'En Vivo'    => 'badge--modality-live',
                    'Online'     => 'badge--modality-online',
                    'Presencial' => 'badge--modality-presencial',
                    default      => '',
                };
            @endphp
            <span class="badge {{ $modalityClass }}">{{ $course['modality'] }}</span>
        </div>

        {{-- Top right: featured / new --}}
        <div class="course-card__badge-top-right">
            @if($course['is_new'])
                <span class="badge badge--new">NUEVO</span>
            @elseif($course['is_featured'])
                <span class="badge badge--featured">DESTACADO</span>
            @endif
        </div>
    </div>

    {{-- Body --}}
    <div class="course-card__body">
        <h3 class="course-card__title">{{ $course['title'] }}</h3>

        <p class="course-card__instructor">
            {{ $course['instructor'] }}
            <span>· {{ $course['instructor_title'] }}</span>
        </p>

        <p class="course-card__desc">{{ $course['description'] }}</p>

        {{-- Meta --}}
        <div class="course-card__meta">
            <span class="course-card__meta-item">
                <span class="course-card__meta-icon" aria-hidden="true">📅</span>
                <span>{{ CoursesData::formatDate($course['start_date']) }}</span>
            </span>
            <span class="course-card__meta-item">
                <span class="course-card__meta-icon" aria-hidden="true">⏱</span>
                <span>{{ $course['duration'] }}</span>
            </span>
        </div>

        {{-- Rating --}}
        <div class="course-card__rating">
            <div class="course-card__stars" aria-label="Calificación: {{ $course['rating'] }} de 5">
                @for($i = 1; $i <= 5; $i++)
                    <span class="course-card__star {{ $i <= floor($course['rating']) ? 'filled' : '' }}" aria-hidden="true">★</span>
                @endfor
            </div>
            <span class="course-card__rating-score">{{ number_format($course['rating'], 1) }}</span>
            <span class="course-card__reviews">{{ number_format($course['review_count']) }} reseñas</span>
        </div>

        <div class="course-card__spacer"></div>

        {{-- Price + CTA --}}
        <div class="course-card__footer">
            <div>
                <p class="course-card__price-original">
                    {{ CoursesData::formatPrice($course['original_price']) }}
                </p>
                <div class="course-card__price-row">
                    <p class="course-card__price-discount">
                        {{ CoursesData::formatPrice($course['discount_price']) }}
                    </p>
                    <span class="badge badge--discount">-{{ $course['discount_pct'] }}%</span>
                </div>
            </div>
            <button class="course-card__cta" aria-label="Inscribirme al curso {{ $course['title'] }}">
                Inscribirme
            </button>
        </div>
    </div>
</article>