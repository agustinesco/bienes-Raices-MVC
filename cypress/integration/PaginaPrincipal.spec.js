describe('Carga la pagina principal',()=>{
    it('Prueba el header de la pagina principal',()=>{
        cy.visit('/');

        cy.get('[data-cy="heading-sitio"]').should('exist')
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal','Venta de Casas y Departamentos de Lujo');
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('not.equal','a');
        cy.get('[data-cy="heading-sitio"]').should('have.class' , 'prueba')
    });
    it('Prueba a los iconos principales',()=>{
        cy.visit('/');

        cy.get('[data-cy="heading-nosotros"]').should('exist')
        cy.get('[data-cy="heading-nosotros"]').invoke('text').should('equal','Más sobre nosotros');
        cy.get('[data-cy="heading-nosotros"]').should('have.prop','tagName').should('equal' , 'H2')
        
        //pruebas a los iconos
        cy.get('[data-cy="iconos-nosotros"]').should('exist')
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('have.length', 3);
        //con find nos deja buscar elementos dentro de otro elemento , se pueden usar selectores de clase
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('have.length.below', 4);
    });
    it('Prueba a las propiedades en el index',()=>{
        cy.visit('/');

        cy.get('[data-cy="anuncio"]').should('have.length', 3)
        
        cy.get('[data-cy="enlace-propiedad"]').first().invoke('text').should('equal','Ver Propiedad')
        cy.get('[data-cy="enlace-propiedad"]').should('have.class', 'boton-amarillo-block')
        
        cy.get('[data-cy="enlace-propiedad"]').first().click()
        cy.get('[data-cy="titulo-propiedad"]').invoke('text').should('have.length.above',1)
        cy.wait(1000).go('back')
    })
    it('Prueba el routing a las propiedades',()=>{
        cy.visit('/')

        cy.get('[data-cy="ver-propiedades"]').invoke('attr', 'href').should('equal','/propiedades')
        cy.get('[data-cy="ver-propiedades"]')
            .should('exist')
            .should('have.class', 'boton-verde')
            .click()
        cy.get('[data-cy="heading-propiedades"]').invoke('text').should('equal' , 'Casas y depas en Venta')
        cy.wait(1000).go('back')
    });
    it('Prueba el segmento de contacto',()=>{
        cy.get('[data-cy="contacto"]').should('exist')
        
        cy.get('[data-cy="contacto"]').find('h2').invoke('text').should('equal','Encuentra la casa de tus sueños')
        cy.get('[data-cy="contacto"]').find('p').invoke('text').should('have.length.above',10)
        cy.get('[data-cy="contacto"]').find('a').invoke('attr','href').should('equal','/contacto')
        cy.get('[data-cy="contacto"]').find('a').invoke('text').should('equal','Contactanos')
        cy.get('[data-cy="contacto"]').find('a').click()
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('equal','Contacto').wait(1000).go('back')

    })
    it('Prueba al segmento de blog',()=>{
        cy.get('[data-cy="blog"]').should('exist')
        cy.get('[data-cy="blog"]').find('h3').invoke('text').should('equal','Nuestro Blog')
        cy.get('[data-cy="blog"]').find('img').should('have.length',2)
        cy.get('[data-cy="entrada-blog"]').should('have.length',2)
    });
    it('prueba a los testimoniales',()=>{
        cy.get('[data-cy="testimoniales"]').should('exist')
        cy.get('[data-cy="testimoniales"]').find('h3').invoke('text').should('equal','Testimoniales')
        cy.get('[data-cy="testimoniales"]').find('blockquote').invoke('text').should('have.length.above',10)
    })
});