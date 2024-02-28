<script>
import { Swiper, SwiperSlide } from 'swiper/vue';

import 'swiper/css';

import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/effect-coverflow';



// import required modules
import { Navigation, Pagination, EffectCoverflow } from 'swiper/modules';
export default {
    data() {
        return {
            isPlaying: false,
            videoSrc: 'https://www.youtube.com/embed/JGKrlJ-To_c?si=OGRQmecENOHEvtms',
            mapSrc: 'https://www.google.com/maps/d/u/0/edit?mid=1wzH8dtcHsWiORKXMi7Sk2iv-fQOBK6M&usp=sharing',
        };
    },
    methods: {
        playVideo() {
            this.isPlaying = true;
        }
    },
     components: {
        Swiper,
        SwiperSlide,
    },
    setup() {
        return {
            modules: [Navigation, Pagination, EffectCoverflow],
        };
    },
};
</script>

<template>
    <div class="info-menu">
        <div class="container mt-4">
            <div class="row mb-3">
                <div class="mt-3 text-center">
                    <h2>ฟีเจอร์หลัก</h2>
                </div>
                
                <!-- First Set of Horizontal Cards -->
            <div class="col-md-4 mt-2 bd-content d-block d-md-none">
              <a :href="mapSrc" target="_blank" rel="noopener noreferrer">
                <div class="card card-vote">
                  <div class="card-img col-5">
                    <div class="img-info">
                      <img class="info-img" src="/img/near.png" alt="" />
                    </div>
                  </div>
                  <div class="card-body c0l-7">
                    <div class="txt-left mt-2">
                      <span><b>ร้าน Refill ใกล้ฉัน</b></span>
                      <p>ค้นหาร้านใกล้คุณ เพื่อสะดวกต่อการใช้บริการ</p>
                    </div>
                    <p :href="mapSrc" target="_blank" class="btn btn-text">ดูเพิ่มเติม &#62;</p>
                  </div>
                </div>
              </a>
            </div>
            <!-- Second Set of Horizontal Cards -->
            <div class="col-md-4 bd-content d-block d-md-none">
              <a href="/product">
                <div class="card card-vote">
                  <div class="card-img col-5">
                    <div class="img-info">
                      <img class="info-img" src="/img/organic.png" alt="" />
                    </div>
                  </div>
                  <div class="card-body col-7">
                    <div class="txt-info mt-2">
                      <span><b>สินค้าออร์แกนิค</b></span>
                      <p>ผลิตภัณฑ์ไม่ใช้สารเคมี สังเคราะห์เป็นมิตรต่อสิ่งแวดล้อม</p>
                    </div>
                    <p :href="mapSrc" target="_blank" class="btn btn-text">ดูเพิ่มเติม &#62;</p>
                  </div>
                </div>
              </a>
            </div>

            <!-- Third Set of Horizontal Cards -->
            <div class="col-md-4 bd-content d-block d-md-none">
              <a href="/product">
                <div class="card card-vote">
                  <div class="card-img col-5">
                    <div class="img-info">
                      <img class="info-img" src="/img/refill.png" alt="" />
                    </div>
                  </div>
                  <div class="card-body col-7">
                    <div class="txt-info mt-2">
                      <span><b>บรรจุภัณฑ์</b></span>
                      <p>ลดปัญหาขยะพลาสติก ด้วยการใช้บรรจุภัณฑ์ที่สามารถใช้ซ้ำได้</p>
                    </div>
                    <p :href="mapSrc" target="_blank" class="btn btn-text">ดูเพิ่มเติม &#62;</p>
                  </div>
                </div>
              </a>
            </div>
            <!-- vertical-card -->
                <div class="col mt-4 mb-4 bd-content d-none d-md-block">
                    <a :href="mapSrc" target="_blank" rel="noopener noreferrer">
                        <div class="card card-vote">
                            <div class="card-img">
                                <div class="img-info">
                                    <img class="info-img" src="/img/near.png" alt="" />
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="txt-left mt-2">
                                    <h4><b>ร้าน Refill ใกล้ฉัน</b></h4>
                                    <p>
                                        ค้นหาร้านใกล้คุณ
                                        เพื่อสะดวกต่อการใช้บริการ
                                    </p>
                                </div>
                            </div>
                            <p :href="mapSrc" target="_blank" class="btn btn-text">ดูเพิ่มเติม &#62;</p>
                        </div>
                    </a>
                </div>
                <div class="col mt-4 mb-4 bd-content d-none d-md-block">
                    <a href="/product">
                        <div class="card card-vote">
                            <div class="card-img">
                                <div class="img-info">
                                        <img class="info-img" src="/img/organic.png" alt="" />
                                    </div>
                            </div>
                            <div class="card-body">
                                <div class="txt-info mt-2">
                                    <h4><b>สินค้าออร์แกนิค</b></h4>
                                    <p>
                                        ผลิตภัณฑ์ไม่ใช้สารเคมี
                                        สังเคราะห์เป็นมิตรต่อสิ่งแวดล้อม
                                    </p>    
                                </div>
                            </div>
                            <p :href="mapSrc" target="_blank" class="btn btn-text">ดูเพิ่มเติม &#62;</p>
                        </div>
                    </a>
                </div>
                <div class="col mt-4 mb-4 bd-content d-none d-md-block">
                    <a href="/product">
                        <div class="card card-vote">
                            <div class="card-img">
                                <div class="img-info">
                                    <img class="info-img" src="/img/refill.png" alt="" />
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="txt-info mt-2">
                                    <h4><b>บรรจุภัณฑ์</b></h4>
                                    <p>
                                        ลดปัญหาขยะพลาสติก
                                        ด้วยการใช้บรรจุภัณฑ์ที่สามารถใช้ซ้ำได้
                                    </p>
                                </div>
                            </div>
                                <p :href="mapSrc" target="_blank" class="btn btn-text">ดูเพิ่มเติม &#62;</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="info-help mt-4 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="video-container">
                        <div v-if="!isPlaying" class="video-space" @click="playVideo">
                            <div class="video-overlay"></div>
                            <div class="videoplay-icon"><img src="/img/play-btn.svg" alt=""></div>
                            <img class="thumbnail" src="/img/refill-thumb.jpg" alt="Video Thumbnail" />
                        </div>
                        <iframe v-if="isPlaying" :src="videoSrc + '&autoplay=1'" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-12 mt-3 mt-md-0 col-md-4">
                    <h4>ร้านรีฟิล"เติมง่าย รักโลกด้วย"</h4>
                    <p>
                        เราทุกคนกินพลาสติกเข้าไปโดยไม่รู้ตัวผ่านทางห่วงโซ่<br>
                        อาหารถึงอาทิตย์ละ 5 กรัม หรือเทียบเท่ากับบัตรเครดิต 1 <br>
                        ใบสามารถลงมือช่วยลดขยะลดการใช้พลาสติกโดยการ<br>หันมาใช้ขวดพลาสติกในการรีฟิลเพื่อลดปัญหาขยะพลาสติก
                    </p>
                    <ul>
                        <li>ตรวจสอบปริมาณที่ต้องการได้</li>
                        <li>คำนวณราคา ได้ตามที่ต้องการ</li>
                        <li>มีสินค้าหลากหลายประเภท</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        <div class="article-sec">
            <div class="text-center txt-home">
                <h3>ข่าวสารยอดนิยม</h3>
                <p>ที่ได้รับความสนใจต่อผู้ใช้งาน</p>
            </div>
            <swiper :effect="'coverflow'" :loop="true" :grabCursor="true" :centeredSlides="true" :slidesPerView="'1'" :coverflowEffect="{
                rotate: 60,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            }" 
            :breakpoints="{
                // Define breakpoints here
                768: {
                    slidesPerView: 1,
                    spaceBetween: 50
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                1440: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },

            }"
            :pagination="false" :navigation="true" :modules="modules" class="mb-4">
                <swiper-slide class="prdslider">
                    <div class="prdslide-con text-center">
                        <div class="prd-img position-relative">
                            <img src="/img/article.jpg" alt="">
                            <div class="position-absolute prd-name align-items-center d-flex justify-content-center text-light"
                                style="left: 25%;bottom: 20px; height: 50px; width: 250px; background: var(--color-primary);">
                                <h5>นำมาแลก ’ถุงขยะรีไซเคิล’ กันนะ</h5>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide class="prdslider">
                    <div class="prdslide-con text-center">
                        <div class="prd-img position-relative">
                            <img src="/img/article.jpg" alt="">
                            <div class="position-absolute prd-name align-items-center d-flex justify-content-center text-light"
                                style="left: 25%;bottom: 20px; height: 50px; width: 250px; background: var(--color-primary);">
                                <h5>นำมาแลก ’ถุงขยะรีไซเคิล’ กันนะ</h5>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide class="prdslider">
                    <div class="prdslide-con text-center">
                        <div class="prd-img position-relative">
                            <img src="/img/article.jpg" alt="">
                            <div class="position-absolute prd-name align-items-center d-flex justify-content-center text-light"
                                style="left: 25%;bottom: 20px; height: 50px; width: 250px; background: var(--color-primary);">
                                <h5>นำมาแลก ’ถุงขยะรีไซเคิล’ กันนะ</h5>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide class="prdslider">
                    <div class="prdslide-con text-center">
                        <div class="prd-img position-relative">
                            <img src="/img/article.jpg" alt="">
                            <div class="position-absolute prd-name align-items-center d-flex justify-content-center text-light"
                                style="left: 25%;bottom: 20px; height: 50px; width: 250px; background: var(--color-primary);">
                                <h5>นำมาแลก ’ถุงขยะรีไซเคิล’ กันนะ</h5>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide class="prdslider">
                    <div class="prdslide-con text-center">
                        <div class="prd-img position-relative">
                            <img src="/img/article.jpg" alt="">
                            <div class="position-absolute prd-name align-items-center d-flex justify-content-center text-light"
                                style="left: 25%;bottom: 20px; height: 50px; width: 250px; background: var(--color-primary);">
                                <h5>นำมาแลก ’ถุงขยะรีไซเคิล’ กันนะ</h5>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide class="prdslider">
                    <div class="prdslide-con text-center">
                        <div class="prd-img position-relative">
                            <img src="/img/article.jpg" alt="">
                            <div class="position-absolute prd-name align-items-center d-flex justify-content-center text-light"
                                style="left: 25%;bottom: 20px; height: 50px; width: 250px; background: var(--color-primary);">
                                <h5>นำมาแลก ’ถุงขยะรีไซเคิล’ กันนะ</h5>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
            
            </swiper>
        </div>
</template>

<style scoped>
.bd a {
    text-decoration: none;
    color: #3e2305;
}

.bd-content a {
    text-decoration: none;
    color: #3e2305;
}
.bd-content .btn.btn-text {
    text-decoration: underline;
    color: rgba(112, 73, 21, 1);
    background: transparent;
    text-align: end;
}
.bd-content:hover .btn.btn-text {
    text-decoration: underline;
    color: var(--color-secondary);
}

/* .bd-content {
    border-right: 2px solid #3e2305;
} */

/* .bd-content :hover img {
    scale: 1.3;
    z-index: 100;
}

.bd :hover img {
    scale: 1.3;
    z-index: 100;
} */



.video-container {
    position: relative;
    width: 100%;
    padding-bottom: 56.25%;
    /* 16:9 aspect ratio */
    border-radius: 1em;
    height: 0;
    overflow: hidden;
}

.video-space {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

.video-overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.5);
}

.thumbnail {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.videoplay-icon {
    transform-origin: center center;
    width: 90px;
    position: absolute;
    z-index: 1;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: flex;
    align-items: center;
    justify-content: center;
    ;
    font-size: 20px;
    border-radius: 100%;
    transition: all ease .4s;
}

.videoplay-icon img {
    transform-origin: center center;
    transition: all ease .4s;
}

.video-container:hover .videoplay-icon img {
    transform: scale(1.1);
    transform-origin: center center;
}


/* .video-container:hover .videoplay-icon {
  transform: scale(1.1);
  transform-origin: center center;
} */

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.info-img {
    max-height: 18vw;
    width: 100%;
}
.card-vote {
    cursor: pointer;
    /* padding: 15px; */
    height: 100%;
    border-radius: 19px;
    border: 0;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.25);
}

.card-vote .card-img {
    position: relative;
    border-radius: 15px 15px 0 0;
    overflow: hidden;
}

.card-vote:hover {
    box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.3);
}

.card-vote .card-img img {
    transition: all ease-in-out .5s;
}

.card-vote:hover .card-img img {
    transform: scale(1.2);
}
@media (max-width: 575.98px) {
   .card{
    flex-direction: row;
    height: 80%;
    padding: 5px;
   }
   .card-vote .card-img {
    position: relative;
    border-radius: 15px 0px 0px 15px;
    overflow: hidden;
    width: 40%;
}
.info-img {
    max-height: 100%;
    height: 100%;
    object-fit: cover;
}
/* .bd-content .card-body{padding: 0 0;} */
.btn.btn.btn-text{margin-left: 50%;}

}
</style>
