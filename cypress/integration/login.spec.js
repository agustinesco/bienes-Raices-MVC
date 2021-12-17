describe('Probar el logeo',()=>{
    it('Prueba la autenticacion en el login',()=>{
        cy.visit('/login')

        cy.get('[data-cy="heading-login"]').should('exist')
        cy.get('[data-cy="heading-login"]').should('have.text','Iniciar sesión')

        cy.get('[data-cy="formulario-login"]').should('exist')

        //ambos campos obligatios
        cy.get('[data-cy="formulario-login"]').submit()
        cy.get('[data-cy="alertas-login"]').should('exist')
        cy.get('[data-cy="alertas-login"]').should('have.length',2)
        cy.get('[data-cy="alertas-login"]').eq(0).should('have.class','alerta').and('have.class','error').and('have.text','El email es obligatorio')
        cy.get('[data-cy="alertas-login"]').eq(1).should('have.class','alerta').and('have.class','error').and('have.text','El password es obligatorio')


        //solo con correo
        cy.get('[data-cy="input-login-email"]').clear().type('correo@correo.com')
        cy.get('[data-cy="formulario-login"]').submit()
        cy.get('[data-cy="alertas-login"]').should('exist')
        cy.get('[data-cy="alertas-login"]').should('have.length',1)
        cy.get('[data-cy="alertas-login"]').should('have.text','El password es obligatorio')

        //el usuario no existe
        cy.get('[data-cy="input-login-email"]').clear().type('algo@algo.com')
        cy.get('[data-cy="input-login-password"]').type('12')
        cy.get('[data-cy="formulario-login"]').submit()
        cy.get('[data-cy="alertas-login"]').should('exist')
        cy.get('[data-cy="alertas-login"]').should('have.length',1)
        cy.get('[data-cy="alertas-login"]').should('have.text','el usuario no existe')

        //el usuario existe
        cy.get('[data-cy="input-login-email"]').clear().type('correo@correo.com')
        cy.get('[data-cy="input-login-password"]').type('12')
        cy.get('[data-cy="formulario-login"]').submit()
        cy.get('[data-cy="alertas-login"]').should('exist')
        cy.get('[data-cy="alertas-login"]').should('have.length',1)
        cy.get('[data-cy="alertas-login"]').should('have.text','Password erroneo')

        //password correcto
        cy.get('[data-cy="input-login-password"]').clear().type('123456')
        cy.get('[data-cy="formulario-login"]').submit()
        cy.url().should('equal','http://localhost:3000/admin')

    })
    
})

