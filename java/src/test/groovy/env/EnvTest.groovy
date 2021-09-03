package env

import spock.lang.Specification

class EnvTest extends Specification {
    def test() {
        expect:
        Env.java().startsWith('11')
    }
}
