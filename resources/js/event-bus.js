import Vue from "vue";

/**
 * Eventbus für Events, welche in Childitems vorkommen (zB. Link-Clicks) und zu Grandparent-Komponenten ge-broadcastet
 * werden sollen.
 */
export const EventBus = new Vue();