import Vue from "vue";

//Eventbus für Events, welche in Childitems vorkommen (zB. Link-Clicks) und zu Grandparent-Komponenten ge"broadcoastet
//werden sollen.
export const EventBus = new Vue();