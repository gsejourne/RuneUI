﻿window.helpers = window.helpers || {};
window.mithril = window.mithril || {};
window.data = window.data || {};
window.modal = window.modal || {};

modal.turnoff = {
    vm: (function(data) {

        var vm = {};

        vm.off = function() {
            data.postData('/system', { poweroff: true });
        };

        vm.reboot = function() {
            data.postData('/system', { reboot: true });
        };

        vm.init = function() {
            $('#dialog').modal('show');
        };

        return vm;

    }()),
    controller: function() {
        modal.turnoff.vm.init();
    },
    view: function(ctrl) {
        return [
            m('.modal-dialog.modal-sm', [
                m('.modal-content', [
                    m('.modal-header', [
                        m('button.close[aria-hidden="true"][data-dismiss="modal"][type="button"]', '×'),
                        m('h4.modal-title[id="poweroff-modal-label"]', 'Turn off the player')
                    ]),
                    m('.modal-body.txtmid', [
                        m('button.btn.btn-primary.btn-lg.btn-block[data-dismiss="modal"][id="syscmd-poweroff"]', { onclick: modal.turnoff.vm.off }, [m('i.fa.fa-power-off.sx'), ' Power off']),
                        m('button.btn.btn-primary.btn-lg.btn-block[data-dismiss="modal"][id="syscmd-reboot"]', { onclick: modal.turnoff.vm.reboot }, [m('i.fa.fa-refresh.sx'), ' Reboot'])
                    ]),
                    m('.modal-footer', [
                        m('button.btn.btn-default.btn-lg[aria-hidden="true"][data-dismiss="modal"]', 'Cancel')
                    ])
                ])
            ])
        ];
    }
};

modal.resetmpd = {
    vm: (function(data) {

        var vm = {};

        vm.reset = function() {
            data.postData('/mpd', { reset: true });
        };

        vm.init = function() {
            $('#dialog').modal('show');
        };

        return vm;

    }()),
    controller: function() {
        modal.resetmpd.vm.init();
    },
    view: function(ctrl) {
        console.log('in resetmpd.view()');
        return [
            m('.modal-dialog', [
                m('.modal-content', [
                    m('.modal-header', [
                        m('button.close[aria-hidden="true"][data-dismiss="modal"][type="button"]', '×'), m('h3.modal-title[id="mpd-config-defaults-label"]', 'Reset the configuration')
                    ]),
                    m('.modal-body', [
                        m('p', [
                            'You are going to reset the configuration to the default original values.',
                            m('br'),
                            ' You will lose any modification.'
                        ])
                    ]),
                    m('.modal-footer', [
                        ' ',
                        m('input[name="reset"][type="hidden"][value="1"]'),
                        m('button.btn.btn-default.btn-lg[aria-hidden="true"][data-dismiss="modal"]', 'Cancel'),
                        m('button.btn.btn-primary.btn-lg[type="submit"]', { onclick: modal.resetmpd.vm.reset }, 'Continue')
                    ])
                ])
            ])
        ];
    }
};

modal.deleteSource = {
    vm: (function(data) {

        var vm = {};

        vm.remove = function() {
            console.log('reset');
            //postData('/sources', { ???: ??? });
        };

        vm.init = function() {
            $('#dialog').modal('show');
        };

        return vm;

    }()),
    controller: function() {
        modal.deleteSource.vm.init();
    },
    view: function() {
        return [
            m('.modal.fade[aria-hidden="true"[id="source-delete-modal"][role="dialog"][tabindex="-1"]', [
                m('.modal-dialog', [
                    m('.modal-content', [
                        m('.modal-header', [
                            m('button.close[aria-hidden="true"][data-dismiss="modal"][type="button"]', '×'),
                            m('h3.modal-title[id="source-delete-modal-label"]', 'Remove the mount')
                        ]),
                        m('.modal-body', [
                            m('p', 'Are you sure you want to delete this mount?')
                        ]),
                        m('.modal-footer', [
                            m('button.btn.btn-default.btn-lg[aria-hidden="true"][data-dismiss="modal"]', 'Cancel'),
                            m('button.btn.btn-primary.btn-lg[name="action"][type="submit"][value="delete"]', { onclick: modal.resetmpd.vm.remove }, 'Remove'),
                            m('input[name="mount[id]"][type="hidden"][value=""]')
                        ])
                    ])
                ])
            ])
        ];
    }
};

modal.sysinfo = {
    vm: (function(data) {

        var vm = {};
        
        // retrieve the timezones
        vm.sysinfoRender = function(element, isInitialized, context) {
            if (isInitialized) {
                return;
            }
            m.request({
                method: 'GET',
                url: '/api/settings/sysinfo/'
            }).then(function(response) {
                system = response.system;
                m.render(document.getElementById('sysinfo-modal-body'), [
                    m('strong', 'Active kernel'),
                    m('p', system.kernel),
                    m('strong', 'System time'),
                    m('p', system.time),
                    m('strong', 'System uptime'),
                    m('p', system.uptime),
                    m('strong', 'HW platform'),
                    m('p', system.HWplatform),
                    m('strong', 'playerID'),
                    m('p', system.playerID)
                ]);
                // console.log('RENDER!');
            });
        };

        vm.refresh = function() {
            m.render(document.getElementById('sysinfo-modal-body'), [
                m('i.fa.fa-spinner.fa-spin')
            ]);
            console.log('RELOAD!');
            vm.sysinfoRender();
        };

        vm.init = function() {
            $('#dialog').modal('show');
        };

        return vm;

    }()),
    controller: function() {
        modal.sysinfo.vm.init();
    },
    view: function(ctrl) {
        return [
            m('.modal-dialog', [
                m('.modal-content', [
                    m('.modal-header', [
                        m('button.close[aria-hidden="true"][data-dismiss="modal"][type="button"]', '×'),
                        m('h3.modal-title[id="sysinfo-modal-label"]', 'System status')
                    ]),
                    m('.modal-body[id="sysinfo-modal-body"]', { config: modal.sysinfo.vm.sysinfoRender }, [
                        m('i.fa.fa-spinner.fa-spin')
                    ]),
                    m('.modal-footer', [
                        m('button.btn.btn-default.btn-lg', { onclick: function() { modal.sysinfo.vm.refresh(); } }, [
                            m('i.fa.fa-refresh.sx'),
                            'Refresh'
                        ]),
                        ' ',
                        m('button.btn.btn-default.btn-lg[aria-hidden="true"][data-dismiss="modal"]', 'Close')
                    ])
                ])
            ])
        ];
    }
};