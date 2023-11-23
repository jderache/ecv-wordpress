<?php 
// Template Name: Page histoire

get_header(); ?>

<section class="content">
    <?php the_content(); ?>
    <div class="founders">
      <div id="founder-1">
        <img src="<?= get_field('avatar_fondateur_1'); ?>" alt="Portrait de Thibaut Dusautoir">
        <h3><?= get_field('nom-fondateur-1'); ?></h3>
        <p class="desc-fondateur"><?= get_field('description_fondateur_1'); ?></p>
    </div>
    <div id="founder-2">
        <img src="<?= get_field('avatar_fondateur_2'); ?>" alt="Portrait de Julien Derache">
        <h3><?= get_field('nom-fondateur-2'); ?></h3>
        <p class="desc-fondateur"><?= get_field('description_fondateur_2'); ?></p>
    </div>
    </div>
</section>
<section id="history-timeline">
  <h2><?= get_field('titre_des_moments_cles');?></h2>
  <?php
    if( have_rows('moments-cles') ):
      echo "<ul>";
      while( have_rows('moments-cles') ): the_row();
          $h3 = get_sub_field('h3_moment');
          $description = get_sub_field('description');
          echo "<li>";
          echo "<h3>" . $h3 . "</h3>";
          echo "<p>" . $description . "</p>";
          echo "</li>";
      endwhile;
      echo "</ul>";
    endif;
  ?>
</section>
<section class="history-slider">
<h2>
 <?= get_field('titre_carrousel'); ?>
</h2>

<div class="PostSlide">
    <div class="innerContainer active">
        <div class="slider">
        <?php if( have_rows('histoire_carrousel') ): ?>
        <?php while( have_rows('histoire_carrousel') ): the_row(); 
            $image = get_sub_field('image');?>
                <div class="slide">
                    <div style="background:url('<?php echo esc_url($image['url']); ?>')"></div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
        <div class="handles">
            <span class="prev">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                          xmlns="http://www.w3.org/2000/svg"><path
                            d="M15.0001 19.92L8.48009 13.4C7.71009 12.63 7.71009 11.37 8.48009 10.6L15.0001 4.07999"
                            stroke="rgb(55 65 81/1)" stroke-width="3" stroke-miterlimit="10"
                            stroke-linecap="round" stroke-linejoin="round"></path></svg>
                </span>
            <span class="next">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg"><path
                          d="M8.99991 19.92L15.5199 13.4C16.2899 12.63 16.2899 11.37 15.5199 10.6L8.99991 4.07999"
                          stroke="rgb(55 65 81/1)" stroke-width="3" stroke-miterlimit="10"
                          stroke-linecap="round" stroke-linejoin="round"></path></svg>
          </span>
        </div>
        <div class="dots">
        </div>
    </div>
</div>
</section>

<script>
var autoplayIntervalInSeconds = 3;

class PostSlider {
    constructor(containerElement,autoplayIntervalInSeconds) {
        this.container = containerElement;
        if (!this.container) {
            throw new Error(`Container not found.`);
        }

        this.slider = this.container.querySelector('.slider');
        this.prevBtn = this.container.querySelector('.handles .prev');
        this.nextBtn = this.container.querySelector('.handles .next');

        this.sLiderWidth = this.slider.clientWidth;
        this.oneSLideWidth = this.container.querySelector('.slide:nth-child(2)').clientWidth;
        console.log(this.oneSLideWidth);
        this.sildesPerPage = Math.trunc(this.sLiderWidth / this.oneSLideWidth);
        this.slideMargin = ((this.sLiderWidth - (this.sildesPerPage * this.oneSLideWidth)) / (this.sildesPerPage * 2)).toFixed(5);
        this.changeSlidesMargins();

        this.dots = this.container.querySelectorAll('.dots span');
        this.bindDotClickHandlers();

        this.makeSliderScrollable();
        this.prevBtn.addEventListener('click', () => this.prevSlider());
        this.nextBtn.addEventListener('click', () => this.nextSlider());

        this.createDots();
        this.setActiveDotByScroll();

        this.autoplayInterval = null;
        this.autoplayDelay = autoplayIntervalInSeconds*1000;

        this.startAutoplay()
        this.container.addEventListener('mouseenter', () => this.pauseAutoplay());
        this.container.addEventListener('mouseleave', () => this.startAutoplay());

        return this;
    }
    changeSlidesMargins() {
        const slides = this.container.querySelectorAll('.slide');
        if (this.oneSLideWidth*2 > this.sLiderWidth){
            this.slideMargin = 1;
            this.oneSLideWidth = this.oneSLideWidth + (this.sLiderWidth - this.oneSLideWidth - 2);
            slides.forEach(slide => {
                slide.style.margin = "0 " + this.slideMargin + "px";
                slide.style.minWidth = this.oneSLideWidth + "px";
            });

        }else {
            slides.forEach(slide => {
                slide.style.margin = "0 " + this.slideMargin + "px";
            });
        }
    }


    scrollToPosition(position, smooth =true) {
        console.log('Scrolling to position:', position);
        const currentPosition = this.slider.scrollLeft;
        const newPosition = currentPosition + position;

        this.slider.scrollTo({
            top: 0,
            left: newPosition,
            behavior: smooth ? 'smooth' : 'instant'
        });

        console.log('Current position - New position:', currentPosition - newPosition);

        setTimeout(() => {
            this.snapToNearestSlide();
        }, 300);
    }
    scrollWithDots(pos) {
        this.slider.scrollTo({
            top: 0,
            left: pos,
            behavior: "smooth"
        });
    }

    handleDotClick(index) {
        const position = index * (this.slider.getBoundingClientRect()['width']);
        this.scrollWithDots(position);
    }

    changeActiveDot(i) {
        for (let j = 0; j < this.dots.length; j++) {
            this.dots[j].classList.remove('active');
        }
        this.dots[i].classList.add('active');
    }


    bindDotClickHandlers() {
        for (let i = 0; i < this.dots.length; i++) {
            this.dots[i].addEventListener('click', () => {
                console.log('Dot clicked:', i);
                this.handleDotClick(i);
            });
        }
    }
    snapToNearestSlide(){

        const currentPosition = this.slider.scrollLeft;
        const nearestLeftScroll = Math.round(currentPosition / (this.oneSLideWidth+(this.slideMargin*2))) * (this.oneSLideWidth+(this.slideMargin*2));
        console.log(nearestLeftScroll);
        this.slider.scrollTo({
            left:  nearestLeftScroll,
            behavior: 'smooth'
        });
    }
    makeSliderScrollable() {
        let isDragging = false;
        let startPosition;
        let startScrollPosition;

        this.slider.addEventListener('mousedown', (event) => startDrag(event));
        this.slider.addEventListener('touchstart', (event) => startDrag(event));

        const startDrag = (event) => {
            isDragging = true;
            startPosition = event.clientX || event.touches[0].clientX;
            startScrollPosition = this.slider.scrollLeft;

            document.addEventListener('mousemove', drag);
            document.addEventListener('touchmove', drag);
            document.addEventListener('mouseup', endDrag);
            document.addEventListener('touchend', endDrag);
        };

        const drag = (event) => {
            if (isDragging) {
                const currentX = event.clientX || event.touches[0].clientX;
                const deltaX = currentX - startPosition;
                this.slider.scrollLeft = startScrollPosition - deltaX;
            }
        };

        const endDrag = () => {
            if (isDragging) {
                isDragging = false;
                const currentPosition = this.slider.scrollLeft;
                const nearestLeftScroll = Math.round(currentPosition / (this.oneSLideWidth+(this.slideMargin*2))) * (this.oneSLideWidth+(this.slideMargin*2));
                console.log(nearestLeftScroll);
                this.slider.scrollTo({
                    left:  nearestLeftScroll,
                    behavior: 'smooth'
                });

                document.removeEventListener('mousemove', drag);
                document.removeEventListener('touchmove', drag);
                document.removeEventListener('mouseup', endDrag);
                document.removeEventListener('touchend', endDrag);
            }
        };
    }

    setActiveDotByScroll() {
        this.dots = this.container.querySelectorAll('.dots span');
        this.slider.addEventListener('scroll', () => {
            const scrollLeft = this.slider.scrollLeft;
            const currentIndex = Math.trunc((Math.abs(scrollLeft) + 2) / this.slider.clientWidth);

            console.log('Scroll Left:', scrollLeft);
            console.log('Current Index:', currentIndex);

            for (let i = 0; i < this.dots.length; i++) {
                this.dots[i].classList.remove('active');
            }

            this.dots[currentIndex].classList.add('active');

            this.prevBtn.style.opacity = Math.abs(scrollLeft) < 1 ? '0' : '1'; /*it means there is no element before so it would hide prev button*/
            this.nextBtn.style.opacity = Math.abs(scrollLeft) + 2 >= this.slider.scrollWidth - this.slider.clientWidth ? '0' : '1'; /*it means there is no element after so it would hide next button*/
        });
    }


    nextSlider() {
        const totalWidth = this.slider.scrollWidth;
        const currentScroll = this.slider.scrollLeft;
        const nextScroll = currentScroll + this.oneSLideWidth + (this.slideMargin * 2);

        if (nextScroll + this.slider.clientWidth > totalWidth) {
            // If next slide goes beyond the end, scroll to the beginning
            this.slider.scrollTo({
                left: 0,
                behavior: 'smooth'
            });
        } else {
            this.scrollToPosition(this.oneSLideWidth + (this.slideMargin * 2));
        }
    }

    prevSlider() {
        const currentScroll = this.slider.scrollLeft;
        const prevScroll = currentScroll - (this.oneSLideWidth + (this.slideMargin * 2));

        if (prevScroll < 0) {
            // If previous slide goes before the beginning, scroll to the end
            this.slider.scrollTo({
                left: this.slider.scrollWidth - this.slider.clientWidth,
                behavior: 'smooth'
            });
        } else {
            this.scrollToPosition(-1 * (this.oneSLideWidth + (this.slideMargin * 2)));
        }
    }

    createDots() {
        const dotCount = Math.floor(this.slider.scrollWidth / this.slider.clientWidth);
        const dotsContainer = this.container.querySelector('.dots');
        dotsContainer.innerHTML = '';

        for (let i = 0; i < dotCount; i++) {
            const dot = document.createElement('span');
            dot.addEventListener('click', () => {
                // this.changeActiveDot(i);
                this.handleDotClick(i);
            });

            if (i === 0) {
                dot.classList.add('active');
            }

            dotsContainer.appendChild(dot);
        }
    }

    startAutoplay() {
        this.autoplayInterval = setInterval(() => {
            this.nextSlider();
        }, this.autoplayDelay);
    }

    pauseAutoplay() {
        clearInterval(this.autoplayInterval);
    }
}

window.addEventListener('load',function (){
    var container = document.querySelector('.PostSlide .innerContainer');
    new PostSlider(container,3);
})
</script>
<?php get_footer(); ?>