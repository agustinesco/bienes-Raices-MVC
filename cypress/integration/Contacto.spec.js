describe('Prueba el formulario de contacto',()=>{
    it('prueba la pagina de contacto y el envio de emails',()=>{
        cy.visit('/contacto')
        cy.get('[data-cy="heading-contacto"]').should('exist')
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('equal','Contacto')

        cy.get('[data-cy="heading-formulario"]').should('exist')
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('equal','Llene el Formulario de Contacto')
    });

    it('llena los campos del formulario',()=>{
        cy.get('[data-cy="input-nombre"]').type('Agustinesco')
        cy.get('[data-cy="input-mensaje"]').type('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla pellentesque nunc eget felis commodo, nec auctor leo viverra. Maecenas auctor posuere turpis sed semper. Integer aliquet nisi in iaculis blandit. Mauris non dictum orci. Sed ligula augue, consequat non enim id, placerat venenatis augue. Vivamus tincidunt justo nibh, in hendrerit ante commodo hendrerit.')
        cy.get('[data-cy="input-opciones"]').select('compra')
        cy.get('[data-cy="dinero"]').type('44444')
        
        //pruebas con telefono
        cy.get('[data-cy="forma-contacto"]').eq(0).check()
        cy.get('[data-cy="input-telefono"]').type('2244536532')
        cy.get('[data-cy="input-fecha"]').type('2021-03-14')
        cy.get('[data-cy="input-hora"]').type('14:00')

        cy.wait(3000)

        //pruebas email
        cy.get('[data-cy="forma-contacto"]').eq(1).check()
        cy.get('[data-cy="input-email"]').type('correo@correo.com')

        cy.get('[data-cy="formulario"]').submit()

        cy.get('[data-cy="alerta-envio"]').should('exist')
        cy.get('[data-cy="alerta-envio"]').invoke('text').should('equal','mensaje enviado')
        cy.get('[data-cy="alerta-envio"]').should('have.class','alerta').and('have.class' , 'exito').and('not.have.class' , 'error')

    })
});