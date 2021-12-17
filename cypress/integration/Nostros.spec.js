describe('Prueba a la pagina de nosotros',()=>{
    it("prueba al header y a la descripcion",()=>{
        cy.visit('/nosotros')
        cy.get('[data-cy="nosotros"]').should('exist');
        cy.get('[data-cy="nosotros"]').find('h1').invoke('text').should('equal', 'Conoce Sobre Nosotros');

        cy.get('[data-cy="imagen-descripcion-nosotros"]').find('img').should('exist')
        cy.get('[data-cy="imagen-descripcion-nosotros"]').find('blockquote').invoke('text').should('equal', '25 años de expreciencia')
        cy.get('[data-cy="imagen-descripcion-nosotros"]').find('p').invoke('text').should('have.length.above',100)
    });
    it("prueba a los iconos",()=>{
        cy.get('[data-cy="iconos-pagina-nosotros"]').find('h1').invoke('text').should('equal', 'Más sobre nosotros')
        cy.get('[data-cy="iconos-pagina-nosotros"]').find('.icono').should('have.length',3)
    });
});