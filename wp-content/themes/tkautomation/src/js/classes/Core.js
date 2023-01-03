import LiteEvents from './LiteEvents';
import PageNav from './PageNav';
import LazyImageCore from './LazyImageCore';
import CounterSliderCore from './CounterSliderCore';
import CardsSliderCore from './CardsSliderCore';
import SectionCore from './SectionsCore';
import CustomSelectCore from './CustomSelectCore';
import FaqCore from './FaqCore';
import TimeSliderCore from './TimeSliderCore';
import LoopSliderCore from './LoopSliderCore';
// import BgToFooter from './sections/BgToFooter';
import ArticleRating from './article/ArticleRating';
import BusinessReviewsCore from './BusinessReviewsCore';
import VideoMentionCardsCore from './VideoMentionCardsCore';
import StackedSliderCore from './StackedSliderCore';
import ButtonVideoPopupCore from './ButtonVideoPopupCore';
import HistoryTile from './cards/HistoryTile';
import CompanyBigPhotoSlider from './sliders/CompanyBigPhotoSlider';
import DotCard from './cards/DotCard';
import TextImageCore from './TextImageCore';
import TextImage from './cards/TextImage';
import VideoSliderPopupCore from './VideoSliderPopupCore';
import VideoSliderPopup from './cards/VideoSliderPopup';
import VideoSlider from './sliders/VideoSlider';
import linkCard from './cards/linkCard';

export default class Core {
  constructor() {
    new LiteEvents();
    new PageNav();
    new SectionCore();
    new LazyImageCore();
    new CounterSliderCore();
    new CardsSliderCore();
    new CustomSelectCore();
    new FaqCore();
    new TimeSliderCore();
    new LoopSliderCore();
    // new BgToFooter();
    new ArticleRating();
    new BusinessReviewsCore();
    new VideoMentionCardsCore();
    new StackedSliderCore();
    new ButtonVideoPopupCore();
    new HistoryTile();
    new CompanyBigPhotoSlider();
    new DotCard();
    new TextImageCore();
    new TextImage();
    new VideoSliderPopupCore();
    new VideoSliderPopup();
    new VideoSlider();
    new linkCard();
  }
}
