import 'mediaelement/full';
import 'mediaelement/build/mediaelementplayer.min.css';

export default class Video {
  constructor(el) {
    if (!this.setVars(el)) return;

    this.initVideo();
    this.bindEvents();
  }

  setVars(el) {
    if (!el) return false;

    this.videoEl = el;
    this.videoPlayer = el.querySelector('[data-video-player]');
    this.muteButton = el.querySelector('[data-video-mute]');
    this.playButton = el.querySelector('[data-video-play]');

    this.defaultSettings = {
      stretching: 'fit',
      videoWidth: '100%',
      videoHeight: '100%',
      enableAutosize: true,
      hideVideoControlsOnLoad: true,
      hideVideoControlsOnPause: true,
      features: ['progress', 'duration'],
    };

    this.playerSettings = el.getAttribute('data-video-settings');
    this.playerSettingsJSON = (this.playerSettings === null)
      ? this.defaultSettings : JSON.parse(this.playerSettings);

    this.mejsVideo = null;

    return true;
  }

  initVideo() {
    this.mejsVideo = new MediaElementPlayer(this.videoPlayer, this.playerSettingsJSON);
    this.mejsVideo.load();
    this.onResize();
  }

  bindEvents() {
    this.bindMute();
    this.bindPlay();
  }

  bindMute() {
    if (!this.muteButton) return;

    this.muteButton.addEventListener('click', (event) => this.onMuteClick(event));
  }

  bindPlay() {
    if (!this.playButton) return;

    this.playButton.addEventListener('click', (event) => this.onPlayClick(event));
  }

  bindResize() {
    window.addEventListener('resize', this.onResize.bind(this));
  }

  onPlayClick(event) {
    const state = this.mejsVideo.paused;

    this.setPlayState(state);
  }

  onMuteClick(event) {
    const volume = this.mejsVideo.getVolume();
    const state = this.mejsVideo.muted;

    this.mejsVideo.setMuted(!state);
  }

  setPlayState(state) {
    (state) ? this.mejsVideo.play() : this.mejsVideo.pause();
    this.togglePlayButton();
  }

  togglePlayButton() {
    if (!this.playButton) return;
    const icon = this.playButton.querySelector('span');

    if (!icon) return;

    icon.classList.toggle('icon-play');
    icon.classList.toggle('icon-pause');
  }

  onResize() {
    this.mejsVideo.features = (window.innerWidth < 768)
      ? []
      : [];
  }
}
